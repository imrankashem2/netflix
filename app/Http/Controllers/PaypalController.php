<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Transactions;
use App\SubscriptionPlan;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use PayPal\Api\PayerInfo;

class PaypalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();
        
        $client_id=getcong('paypal_client_id');
        $secret=getcong('paypal_secret');
        $mode=getcong('paypal_mode');

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($client_id, $secret));
        $this->_api_context->setConfig(array('mode' => $mode,'http.ConnectionTimeOut' => 1000,'log.LogEnabled' => true,'log.FileName' => storage_path() . '/logs/paypal.log','log.LogLevel' => 'FINE'));

        //$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        //$this->_api_context->setConfig($paypal_conf['settings']);
    }
     
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {   

        $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';

        $plan_id=$request->get('plan_id');
        $plan_name=$request->get('plan_name');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($plan_name) /** item name **/
            ->setCurrency($currency_code)
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency($currency_code)
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::flash('error_flash_message','Connection timeout');
                return redirect('dashboard');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::flash('error_flash_message','Some error occur, sorry for inconvenient');
                return redirect('dashboard');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        /** add user plan details to session **/
        Session::put('plan_id', $plan_id);
        //Session::put('plan_amount', $request->get('amount'));

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::flash('error_flash_message','Unknown error occurred');
        return Redirect::route('dashboard');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(\Request::input('PayerID')) || empty(\Request::input('token'))) {
            \Session::flash('error_flash_message','Payment failed');
            return redirect('dashboard');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(\Request::input('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        $payer_email= $result->getPayer()->getPayerInfo()->getEmail();
    //        echo $result->getEmail();
        /**dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 
            
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            $user_id=Auth::user()->id;           
            $user = User::findOrFail($user_id);

            $plan_id = Session::get('plan_id');
            $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
            $plan_days=$plan_info->plan_days;
            $plan_amount=$plan_info->plan_price;

            $user->plan_id = $plan_id;
            $user->start_date = strtotime(date('m/d/Y'));             
            $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
             
            $user->paypal_payment_id = $payment_id;
            $user->plan_amount = $plan_amount;

            //$user->subscription_status = 0;
            $user->save();

            

            $payment_trans = new Transactions;

            $payment_trans->user_id = Auth::user()->id;
            $payment_trans->email = $payer_email;
            $payment_trans->plan_id = $plan_id;
            $payment_trans->gateway = 'Paypal';
            $payment_trans->payment_amount = $plan_amount;
            $payment_trans->payment_id = $payment_id;
            $payment_trans->date = strtotime(date('m/d/Y H:i:s'));
            
            $payment_trans->save();

            Session::flash('plan_id',Session::get('plan_id'));           

           if(getenv("MAIL_USERNAME"))
          {
            //Subscription Create Email
            $user_full_name=$user->name;

            $data_email = array(
                'name' => $user_full_name
                 );    

           \Mail::send('emails.subscription_created', $data_email, function($message) use ($user,$user_full_name){
                $message->to($user->email, $user_full_name)
                    ->from(getcong('site_email'), getcong('site_name')) 
                    ->subject('Subscription Created');
            });

         } 


            \Session::flash('success',trans('words.payment_success'));
            return redirect('dashboard');
        }
        \Session::flash('error_flash_message',trans('words.payment_failed'));
        return redirect('dashboard');
    }
  }
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
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class StripeController extends Controller
{
     
    
    public function payWithStripe($plan_id)
    {   
        Session::put('plan_id', $plan_id);        

        return view('pages.paywithstripe');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',             
        ]);
        
        $plan_id = Session::get('plan_id');

        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
        $plan_name=$plan_info->plan_name;
        $plan_days=$plan_info->plan_days;
        $plan_amount=$plan_info->plan_price;

        //$plan_name=Session::get('plan_name').' membership';

        $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';

        $input = $request->all();
        if ($validator->passes()) {           
            //$input = array_except($input,array('_token'));
            $input =  \Request::except(array('_token')) ;
                        
            $stripe = Stripe::make(getcong('stripe_secret_key'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year'  => $request->get('ccExpiryYear'),
                        'cvc'       => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    \Session::flash('error_flash_message','The Stripe Token was not generated correctly');
                    return redirect()->back()->withInput();
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $currency_code,
                    'amount'   => $plan_amount,
                    'description' => $plan_name,
                ]);

                //print_r($charge);
                //exit;
                if($charge['status'] == 'succeeded') {
                    /**
                    * Write Here Your Database insert logic.
                    */

                    $user_id=Auth::user()->id;
           
                    $user = User::findOrFail($user_id);

                    $user->plan_id = $plan_id;                    
                    $user->start_date = strtotime(date('m/d/Y'));             
                    $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
                    
                    $user->stripe_payment_id = $charge['id'];
                    $user->plan_amount = $plan_amount;
                    //$user->subscription_status = 0;
                    $user->save();
 
 
                    $payment_trans = new Transactions;

                    $payment_trans->user_id = Auth::user()->id;
                    $payment_trans->email = Auth::user()->email;
                    $payment_trans->plan_id = $plan_id;
                    $payment_trans->gateway = 'Stripe';
                    $payment_trans->payment_amount = $plan_amount;
                    $payment_trans->payment_id = $charge['id'];
                    $payment_trans->date = strtotime(date('m/d/Y H:i:s'));                    
                    $payment_trans->save();

                    Session::flash('plan_id',Session::get('plan_id'));
                    
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


                    \Session::flash('success',trans('words.payment_success'));
                    return redirect('dashboard');
                } else {
                    \Session::flash('error_flash_message',trans('words.money_not_add_in_wallet'));
                    return redirect()->back()->withInput();
                }
            } catch (Exception $e) {
                \Session::flash('error_flash_message',$e->getMessage());
                return redirect()->back()->withInput();
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::flash('error_flash_message',$e->getMessage());
                return redirect()->back()->withInput();
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::flash('error_flash_message',$e->getMessage());
                return redirect()->back()->withInput();
            }
        }
        \Session::flash('error_flash_message',trans('words.all_fields_req'));
        return redirect()->back()->withInput();
    }    
}
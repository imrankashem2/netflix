<?php

namespace App\Http\Controllers\API;

use Auth;
use App\User;
use App\Slider;
use App\Series;
use App\Season; 
use App\Episodes;
use App\Movies;
use App\HomeSection;
use App\Sports;
use App\Pages;
use App\RecentlyWatched;
use App\Language;
use App\Genres;
use App\Settings;
use App\SportsCategory;
use App\SubscriptionPlan;
use App\Transactions;
use App\SettingsAndroidApp;
use App\TvCategory;
use App\LiveTV;

use App\PasswordReset;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Session;
use URL;
use Illuminate\Support\Facades\Password;

require(base_path() . '/public/stripe-php/init.php'); 

class AndroidApiController extends MainAPIController
{
      
    public function index()
    {   
          $response[] = array('msg' => "API",'success'=>'1'); 
        
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));   
         
    }
    public function app_details()
    {   
        
        $get_data=checkSignSalt($_POST['data']);

        if(isset($get_data['user_id']) && $get_data['user_id']!='')
        {
            $user_id=$get_data['user_id'];        
            $user_info = User::findOrFail($user_id);

            if($user_info->status==1)
            {
                $user_status=true;
            }
            else
            {
                $user_status=false;
            }
        }
        else
        {
            $user_status=false;
        }
        

        $settings = SettingsAndroidApp::findOrFail('1'); 

        $app_name=$settings->app_name;
        $app_logo=\URL::to('upload/source/'.$settings->app_logo);
        $app_version=$settings->app_version?$settings->app_version:'';
        $app_company=$settings->app_company?$settings->app_company:'';
        $app_email=$settings->app_email;
        $app_website=$settings->app_website?$settings->app_website:'';
        $app_contact=$settings->app_contact?$settings->app_contact:'';
        $app_about=$settings->app_about?stripslashes($settings->app_about):'';
        $app_privacy=$settings->app_privacy?stripslashes($settings->app_privacy):'';
        $publisher_id=$settings->publisher_id;
        $interstital_ad=$settings->interstital_ad;
        $interstital_ad_id=$settings->interstital_ad_id;
        $interstital_ad_click=$settings->interstital_ad_click;
        $banner_ad=$settings->banner_ad;
        $banner_ad_id=$settings->banner_ad_id;

        $app_package_name=env('BUYER_APP_PACKAGE_NAME')?env('BUYER_APP_PACKAGE_NAME'):"";

        $response[] = array('app_package_name'=>$app_package_name,'app_name' => $app_name,'app_logo' => $app_logo,'app_version' => $app_version,'app_company' => $app_company,'app_email' => $app_email,'app_website' => $app_website,'app_contact' => $app_contact,'app_about' => $app_about,'app_privacy' => $app_privacy,'publisher_id' => $publisher_id,'interstital_ad' => $interstital_ad,'interstital_ad_id' => $interstital_ad_id,'interstital_ad_click' => $interstital_ad_click,'banner_ad' => $banner_ad,'banner_ad_id' => $banner_ad_id,'success'=>'1');

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'user_status' => $user_status,
            'status_code' => 200
        )); 

    }

    public function payment_settings()
    {
        $get_data=checkSignSalt($_POST['data']);

        $settings = Settings::findOrFail('1'); 

        $currency_code=$settings->currency_code;
        $paypal_payment_on_off=$settings->paypal_payment_on_off?"true":"false";
        $paypal_mode=$settings->paypal_mode;
        $paypal_client_id=$settings->paypal_client_id?$settings->paypal_client_id:'';
        $paypal_secret=$settings->paypal_secret?$settings->paypal_secret:'';
        $stripe_payment_on_off=$settings->stripe_payment_on_off?"true":"false";
        $stripe_secret_key=$settings->stripe_secret_key?$settings->stripe_secret_key:'';
        $stripe_publishable_key=$settings->stripe_publishable_key?$settings->stripe_publishable_key:'';
        $razorpay_payment_on_off=$settings->razorpay_payment_on_off?"true":"false";
        $razorpay_key=$settings->razorpay_key;
        $razorpay_secret=$settings->razorpay_secret;

        $response[] = array('currency_code' => $currency_code,'paypal_payment_on_off' => $paypal_payment_on_off,'paypal_mode' => $paypal_mode,'paypal_client_id' => $paypal_client_id,'paypal_secret' => $paypal_secret,'stripe_payment_on_off' => $stripe_payment_on_off,'stripe_secret_key' => $stripe_secret_key,'stripe_publishable_key' => $stripe_publishable_key,'razorpay_payment_on_off' => $razorpay_payment_on_off,'razorpay_key' => $razorpay_key,'razorpay_secret' => $razorpay_secret,'success'=>'1');

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        )); 
    }
      
    public function postLogin()
    {   
        
        $get_data=checkSignSalt($_POST['data']);

          
        $email=isset($get_data['email'])?$get_data['email']:'';
        $password=isset($get_data['password'])?$get_data['password']:'';
        
        if ($email=='' AND $password=='')
        {
                 
               $response[] = array('msg' => "All field required",'success'=>'0'); 

                return \Response::json(array(            
                    'VIDEO_STREAMING_APP' => $response,
                    'status_code' => 200
                ));
        }
 
        $user_info = User::where('email',$email)->first(); 

         
        if (Hash::check($password, $user_info['password'])) 
        {
           
            if($user_info->status==0){
                //\Auth::logout();
                 
                  $response[] = array('msg' => trans('words.account_banned'),'success'=>'0');
            }             
            else
            { 
                $user_id=$user_info->id;
                $user = User::findOrFail($user_id);

                 
                if($user->user_image!='')
                {
                    $user_image=\URL::asset('upload/'.$user->user_image);
                }
                else
                {
                    $user_image=\URL::asset('upload/profile.png');
                }

                $response[] = array('user_id' => $user_id,'name' => $user->name,'email' => $user->email,'user_image' => $user_image,'msg' => 'Login successfully...','success'=>'1');
            }

        }
        else
        {
            $response[] = array('msg' => trans('words.email_password_invalid'),'success'=>'0');
        }
        
        
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));   
    }
     

    public function postSignup()
    { 
         

        $get_data=checkSignSalt($_POST['data']);

        //echo $get_data['name'];
        //exit;

        $name=isset($get_data['name'])?$get_data['name']:'';  
        $email=isset($get_data['email'])?$get_data['email']:'';
        $password=isset($get_data['password'])?$get_data['password']:'';
        

        if ($name=='' AND $email=='' AND $password=='')
        {
                 
               $response[] = array('msg' => "All fields required",'success'=>'0'); 

                return \Response::json(array(            
                    'VIDEO_STREAMING_APP' => $response,
                    'status_code' => 200
                ));
        } 
        
         
        $user = new User;

        //$confirmation_code = str_random(30);

        
        $user->usertype = 'User';
        $user->name = $name; 
        $user->email = $email;         
        $user->password= bcrypt($password);          
        $user->save();

        //Welcome Email

        if(getenv("MAIL_USERNAME"))
        {
            $user_name=$name;
            $user_email=$email;

            $data_email = array(
                'name' => $user_name,
                'email' => $user_email
                );    

            \Mail::send('emails.welcome', $data_email, function($message) use ($user_name,$user_email){
                $message->to($user_email, $user_name)
                ->from(getcong('site_email'), getcong('site_name'))
                ->subject('Welcome to '.getcong('site_name'));
            });    
        }        
 
        $response[] = array('msg' => trans('words.account_created_successfully'),'success'=>'1');
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));

         
    }

    public function forgot_password()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $email=isset($get_data['email'])?$get_data['email']:'';
 
        $user = User::where('email', $email)->first();

        //dd($user);
        //exit;

        if(!$user)
        {
            $response[] = array('msg' => 'We can\'t find a user with that e-mail address.','success'=>'1');
        }
        else
        {   
           /* $reset_token= Str::random(60);

            $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email],['email' => $user->email,
                'token' => bcrypt($reset_token)]);


            if(getenv("MAIL_USERNAME"))
            {
                 
                $user_email=$email;
                $url=url('password/reset/'.$reset_token);

                $data_email = array(
                    'url' => $url 
                    );    

                \Mail::send('emails.password', $data_email, function($message) use ($user_email){
                    $message->to($user_email, '')
                    ->from(getcong('site_email'), getcong('site_name'))
                    ->subject('Reset Password');
                });    
            } */

           $email_a=array("email"=>$email);

           $response1 = Password::sendResetLink($email_a, function (Message $message) {
           $message->subject('Your Password Reset Link');
           $message->sender(getcong('site_email'));     
           });
     
           
           $response[] = array('msg' => 'We have e-mailed your password reset link!','success'=>'1');
 
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function dashboard()
    {
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        $user = User::findOrFail($user_id);

                 
        if($user->user_image!='')
        {
            $user_image=\URL::asset('upload/'.$user->user_image);
        }
        else
        {
            $user_image=\URL::asset('upload/profile.jpg');
        }

        if($user->plan_id==0)
        {
            $current_plan='';
        }
        else
        {
            $current_plan=SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name');
        }

        if($user->exp_date)
        {
            $expires_on=date('F,  d, Y',$user->exp_date);
        }
        else
        {
            $expires_on='';
        }

        if($user->start_date)
        {
            $last_invoice_date=date('F,  d, Y',$user->start_date);
        }
        else
        {
            $last_invoice_date='';
        }
        
        $last_invoice_plan=$current_plan;

        if($user->plan_amount)
        {
            $last_invoice_amount=number_format($user->plan_amount,2,'.', '');
        }
        else
        {
           $last_invoice_amount=''; 
        }
        

        $response[] = array('user_id' => $user_id,'name' => $user->name,'email' => $user->email,'user_image' => $user_image,'current_plan' => $current_plan,'expires_on' => $expires_on,'last_invoice_date' => $last_invoice_date,'last_invoice_plan' => $last_invoice_plan,'last_invoice_amount' => $last_invoice_amount,'msg' => 'Dashboard','success'=>'1');


        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }
    public function profile()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        $user = User::findOrFail($user_id);

                 
        if($user->user_image!='')
        {
            $user_image=\URL::asset('upload/'.$user->user_image);
        }
        else
        {
            $user_image=\URL::asset('upload/profile.jpg');
        }

        $phone=$user->phone?$user->phone:'';
        $user_address=$user->user_address?$user->user_address:'';

        $response[] = array('user_id' => $user_id,'name' => $user->name,'email' => $user->email,'phone' => $phone,'user_address' => $user_address,'user_image' => $user_image,'msg' => 'Profile','success'=>'1');


        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function profile_update(Request $request)
    { 
         //$data =  \Request::except(array('_token'));
         
        $inputs = $request->all();
         //dd($inputs);
        //exit;
        //echo $inputs['data'];
        $get_data=checkSignSalt($inputs['data']);

          
        $user_id=$get_data['user_id'];    
        $user = User::findOrFail($user_id);

        $icon = $request->file('user_image');
        
                 
        if($icon){

            \File::delete(public_path('/upload/').$user->user_image);            

            //$tmpFilePath = public_path().'/upload/';
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($get_data['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->user_image = $hardPath.'-b.jpg';
        }
        
        
        $user->name = $get_data['name'];          
        $user->email = $get_data['email']; 
        $user->phone = $get_data['phone'];
        $user->user_address = $get_data['user_address'];
        
        if($get_data['password'])
        {
            $user->password = bcrypt($get_data['password']);
        }         
       
        $user->save();


        $response[] = array('msg' => trans('words.successfully_updated'),'success'=>'1');
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function check_user_plan()
    {
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        $user_info = User::findOrFail($user_id);
        $user_plan_id=$user_info->plan_id;
        $user_plan_exp_date=$user_info->exp_date;
 

        if($user_plan_id==0)
        {          
            //\Session::flash('flash_message', 'Login status reset!');
            $response = array('msg' => 'Please select subscription plan','success'=>'0');

            return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
            ));
        }
        else if(strtotime(date('m/d/Y'))>$user_plan_exp_date)
        {

                $current_plan=SubscriptionPlan::getSubscriptionPlanInfo($user_plan_id,'plan_name');
                
                $expired_on=$user_plan_exp_date;

                $response = array('current_plan'=>$current_plan,'expired_on'=>$expired_on,'msg' => 'Renew subscription plan','success'=>'0');

                return \Response::json(array(            
                'VIDEO_STREAMING_APP' => $response,
                'status_code' => 200
                ));
        }
        else
        {
                $current_plan=SubscriptionPlan::getSubscriptionPlanInfo($user_plan_id,'plan_name');
                
                $expired_on=$user_plan_exp_date;

                $response = array('current_plan'=>$current_plan,'expired_on'=>$expired_on,'msg' => 'My Subscription','success'=>'1');

                return \Response::json(array(            
                'VIDEO_STREAMING_APP' => $response,
                'status_code' => 200
                ));
        }        
        
        
    }

    public function subscription_plan()
    {
        $get_data=checkSignSalt($_POST['data']);

        $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get(); 


        $settings = Settings::findOrFail('1'); 

        $currency_code=$settings->currency_code;
 
        foreach($plan_list as $plan_data)
        {
                $plan_id= $plan_data->id;
                $plan_name= $plan_data->plan_name;  
                $plan_duration= SubscriptionPlan::getPlanDuration($plan_data->id);
                $plan_price= $plan_data->plan_price;                 
                 
                $response[]=array("plan_id"=>$plan_id,"plan_name"=>$plan_name,"plan_duration"=>$plan_duration,"plan_price"=>$plan_price,"currency_code"=>$currency_code);   
        }    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function stripe_token_get()
    {
        
        $get_data=checkSignSalt($_POST['data']);

        $amount=$get_data['amount'];

        \Stripe\Stripe::setApiKey(getcong('stripe_secret_key'));

        $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';

        //$amount=10;

        $intent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => $currency_code,
            ]);

        if (!isset($intent->client_secret))
        {
            $response[]=array("msg"=>"The Stripe Token was not generated correctly",'success'=>'0');
        }
        else
        {
            $client_secret = $intent->client_secret;

            $response[]=array("stripe_payment_token"=>$client_secret,"msg"=>"Stripe Token",'success'=>'1');
        }   
        

          return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));  
    }

    public function transaction_add()
    {
        $get_data=checkSignSalt($_POST['data']);

        $plan_id=$get_data['plan_id'];
        $user_id=$get_data['user_id'];
        $payment_id=$get_data['payment_id'];
        $payment_gateway=$get_data['payment_gateway'];

        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
        $plan_name=$plan_info->plan_name;
        $plan_days=$plan_info->plan_days;
        $plan_amount=$plan_info->plan_price;

        //User info update        
           
        $user = User::findOrFail($user_id);

        $user_email=$user->email;

        $user->plan_id = $plan_id;                    
        $user->start_date = strtotime(date('m/d/Y'));             
        $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
        
        if($payment_gateway=="Stripe")
        {
             $user->stripe_payment_id = $payment_id;
        }
        else
        {
            $user->paypal_payment_id = $payment_id;
        }       
        
        $user->plan_amount = $plan_amount;         
        $user->save();

        //Transactions info update
        $payment_trans = new Transactions;

        $payment_trans->user_id = $user_id;
        $payment_trans->email = $user_email;
        $payment_trans->plan_id = $plan_id;
        $payment_trans->gateway = $payment_gateway;
        $payment_trans->payment_amount = $plan_amount;
        $payment_trans->payment_id = $payment_id;
        $payment_trans->date = strtotime(date('m/d/Y H:i:s'));                    
        $payment_trans->save();

        $response[] = array('msg' => trans('words.payment_success'),'success'=>'1');
        
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }
 
    public function logout()
    {
        $response[] = array('msg' => 'logout','success'=>'1');
        
        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }


    public function home()
    {   
        
        $get_data=checkSignSalt($_POST['data']);

        $slider= Slider::where('status',1)->orderby('id','DESC')->get();

        foreach($slider as $slider_data)
        { 
            $response['slider'][]=array("slider_title"=>$slider_data->slider_title,"slider_type"=>$slider_data->slider_type,"slider_post_id"=>$slider_data->slider_post_id,"slider_image"=>\URL::to('upload/source/'.$slider_data->slider_image));
        }

        //Recently Watched
        if(isset($get_data['user_id']))
        {   
            $current_user_id=$get_data['user_id'];
            //exit;
            $recently_watched = RecentlyWatched::where('user_id',$current_user_id)->orderby('id','DESC')->get();
             
            if(count($recently_watched) > 0)
            {  
                foreach($recently_watched as $watched_videos)
                {
                    
                    

                    if($watched_videos->video_type=="Movies")
                    {
                        $thumb_image=URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image);

                        $video_thumb_image=$thumb_image?$thumb_image:"";

                        $video_id=$watched_videos->video_id;
                        $video_type=$watched_videos->video_type;
                    }
                    else if($watched_videos->video_type=="Sports")
                    {
                        $thumb_image=URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image);

                        $video_thumb_image=$thumb_image?$thumb_image:"";

                        $video_id=$watched_videos->video_id; 
                        $video_type=$watched_videos->video_type;
                    }
                    else if($watched_videos->video_type=="Episodes")
                    { 
                        $thumb_image= URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image);   

                        $video_thumb_image=$thumb_image?$thumb_image:"";

                        $video_id=recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->episode_series_id;
                        $video_type="Shows";
                    }
                    else if($watched_videos->video_type=="LiveTV")
                    {
                        $thumb_image=URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_thumb);

                        $video_thumb_image=$thumb_image?$thumb_image:"";

                        $video_id=$watched_videos->video_id;
                        $video_type=$watched_videos->video_type;
                    }
                    else
                    {
                        $video_thumb_image="";

                        $video_id=$watched_videos->video_id;
                        $video_type=$watched_videos->video_type;
                    }

                    $response['recently_watched'][] = array("video_id"=>$video_id,"video_type"=>$video_type,"video_thumb_image"=>$video_thumb_image);
                }
            }
            else
            {
                

                $response['recently_watched'] = array();
            }
        }
        else
        {
                $response['recently_watched'] = array();
        }

        $home_sections = HomeSection::findOrFail('1');

        //Latest
        foreach(explode(",",$home_sections->section1_latest_movie) as $latest_movie)
        {   
             if(Movies::getMoviesInfo($latest_movie,'status')==1) 
             {
                $movie_id= Movies::getMoviesInfo($latest_movie,'id');
                $movie_title= Movies::getMoviesInfo($latest_movie,'video_title');
                $movie_poster= URL::to('upload/source/'.Movies::getMoviesInfo($latest_movie,'video_image_thumb'));
                $movie_duration= Movies::getMoviesInfo($latest_movie,'duration');
                $movie_access=Movies::getMoviesInfo($latest_movie,'video_access');

                $response['latest_movies'][]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
              }
        }

        foreach(explode(",",$home_sections->section2_latest_series) as $latest_series)
        {   
            if(Series::getSeriesInfo($latest_series,'status')==1)
            { 
                $show_id= Series::getSeriesInfo($latest_series,'id');
                $show_title= Series::getSeriesInfo($latest_series,'series_name');
                $show_poster= URL::to('upload/source/'.Series::getSeriesInfo($latest_series,'series_poster'));
                
                $response['latest_shows'][]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);
            }
        }

        //Popular
        foreach(explode(",",$home_sections->section3_popular_movie) as $popular_movie)
        {   
             if(Movies::getMoviesInfo($popular_movie,'status')==1) 
             {
                $movie_id= Movies::getMoviesInfo($popular_movie,'id');
                $movie_title= Movies::getMoviesInfo($popular_movie,'video_title');
                $movie_poster= URL::to('upload/source/'.Movies::getMoviesInfo($popular_movie,'video_image_thumb'));
                $movie_duration= Movies::getMoviesInfo($popular_movie,'duration');
                $movie_access=Movies::getMoviesInfo($popular_movie,'video_access');

                $response['popular_movies'][]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
              }
        }

        foreach(explode(",",$home_sections->section3_popular_series) as $popular_series)
        {   
            if(Series::getSeriesInfo($popular_series,'status')==1)
            { 
                $show_id= Series::getSeriesInfo($popular_series,'id');
                $show_title= Series::getSeriesInfo($popular_series,'series_name');
                $show_poster= URL::to('upload/source/'.Series::getSeriesInfo($popular_series,'series_poster'));
                
                $response['popular_shows'][]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);
            }
        }

        //Section 3
        $response['home_sections3_title']=$home_sections->section3_title;
        $response['home_sections3_type']=$home_sections->section3_type;
        $response['home_sections3_lang_id']=$home_sections->section3_lang?$home_sections->section3_lang:'';

        if($home_sections->section3_type=="Series")
        {   
            $section3_lang_id=$home_sections->section3_lang;
            $home_sections_list3 = Series::where('status',1)->where('series_lang_id',$section3_lang_id)->orderBy('id','DESC')->take(10)->get();
            
            if(count($home_sections_list3) >0 AND  $section3_lang_id!='')
            {
                foreach($home_sections_list3 as $list3_data)
                {   
                        $s_m_id= $list3_data->id;
                        $s_m_title=  $list3_data->series_name;
                        $s_m_poster=  URL::to('upload/source/'.$list3_data->series_poster);
                         
                        $response['home_sections3'][]=array("show_id"=>$s_m_id,"show_title"=>$s_m_title,"show_poster"=>$s_m_poster);
                      
                }
            }
            else
            {
                $response['home_sections3']=array();
            }
        }
        else
        {
           $section3_lang_id=$home_sections->section3_lang; 
           $home_sections_list3 = Movies::where('status',1)->where('movie_lang_id',$section3_lang_id)->orderBy('id','DESC')->take(10)->get(); 
           
           if(count($home_sections_list3) >0 AND  $section3_lang_id!='')
            {
                foreach($home_sections_list3 as $list3_data)
                {   
                        $s_m_id= $list3_data->id;
                        $s_m_title=  $list3_data->video_title;
                        $s_m_poster=  URL::to('upload/source/'.$list3_data->video_image_thumb);
                        $s_m_duration= $list3_data->duration;
                        $s_m_access= $list3_data->video_access;

                        $response['home_sections3'][]=array("movie_id"=>$s_m_id,"movie_title"=>$s_m_title,"movie_poster"=>$s_m_poster,"movie_duration"=>$s_m_duration,"movie_access"=>$s_m_access);
                      
                }
            }
            else
            {
                $response['home_sections3']=array();
            }
        }

        //Section 4
        $response['home_sections4_title']=$home_sections->section4_title;
        $response['home_sections4_type']=$home_sections->section4_type;
        $response['home_sections4_lang_id']=$home_sections->section4_lang?$home_sections->section4_lang:'';

        if($home_sections->section4_type=="Series")
        {   
            $section4_lang_id=$home_sections->section4_lang;
            $home_sections_list4 = Series::where('status',1)->where('series_lang_id',$section4_lang_id)->orderBy('id','DESC')->take(10)->get();

            if(count($home_sections_list4) >0 AND  $section4_lang_id!='')
            {

                foreach($home_sections_list4 as $list4_data)
                {   
                        $s_m_id= $list4_data->id;
                        $s_m_title=  $list4_data->series_name;
                        $s_m_poster=  URL::to('upload/source/'.$list4_data->series_poster);
                         
                        $response['home_sections4'][]=array("show_id"=>$s_m_id,"show_title"=>$s_m_title,"show_poster"=>$s_m_poster);
                      
                }
            }
            else
            {
                $response['home_sections4']=array();
            }
        }
        else
        {
           $section4_lang_id=$home_sections->section4_lang; 
           $home_sections_list4 = Movies::where('status',1)->where('movie_lang_id',$section4_lang_id)->orderBy('id','DESC')->take(10)->get(); 

            if(count($home_sections_list4) >0 AND  $section4_lang_id!='')
            {
                foreach($home_sections_list4 as $list4_data)
                {   
                        $s_m_id= $list4_data->id;
                        $s_m_title=  $list4_data->video_title;
                        $s_m_poster=  URL::to('upload/source/'.$list4_data->video_image_thumb);
                        $s_m_duration= $list4_data->duration;
                        $s_m_access= $list4_data->video_access;

                        $response['home_sections4'][]=array("movie_id"=>$s_m_id,"movie_title"=>$s_m_title,"movie_poster"=>$s_m_poster,"movie_duration"=>$s_m_duration,"movie_access"=>$s_m_access);
                      
                }
            }
            else
            {
                $response['home_sections4']=array();
            }
        }

        //Section 5
        $response['home_sections5_title']=$home_sections->section5_title;
        $response['home_sections5_type']=$home_sections->section5_type;
        $response['home_sections5_lang_id']=$home_sections->section5_lang?$home_sections->section5_lang:'';

        if($home_sections->section5_type=="Series")
        {   
            $section5_lang_id=$home_sections->section5_lang;
            $home_sections_list5 = Series::where('status',1)->where('series_lang_id',$section5_lang_id)->orderBy('id','DESC')->take(10)->get();

            if(count($home_sections_list5) >0 AND  $section5_lang_id!='')
            {
                foreach($home_sections_list5 as $list5_data)
                {   
                        $s_m_id= $list5_data->id;
                        $s_m_title=  $list5_data->series_name;
                        $s_m_poster=  URL::to('upload/source/'.$list5_data->series_poster);
                         
                        $response['home_sections5'][]=array("show_id"=>$s_m_id,"show_title"=>$s_m_title,"show_poster"=>$s_m_poster);
                      
                }
            }
            else
            {
                $response['home_sections5']=array();
            }
        }
        else
        {
           $section5_lang_id=$home_sections->section5_lang; 
           $home_sections_list5 = Movies::where('status',1)->where('movie_lang_id',$section5_lang_id)->orderBy('id','DESC')->take(10)->get(); 
           
           if(count($home_sections_list5) >0 AND  $section5_lang_id!='')
            {
                foreach($home_sections_list5 as $list5_data)
                {   
                        $s_m_id= $list5_data->id;
                        $s_m_title=  $list5_data->video_title;
                        $s_m_poster=  URL::to('upload/source/'.$list5_data->video_image_thumb);
                        $s_m_duration= $list5_data->duration;
                        $s_m_access= $list5_data->video_access;

                        $response['home_sections5'][]=array("movie_id"=>$s_m_id,"movie_title"=>$s_m_title,"movie_poster"=>$s_m_poster,"movie_duration"=>$s_m_duration,"movie_access"=>$s_m_access);
                      
                }
            }
            else
            {
                $response['home_sections5']=array();
            }
        }


        //$response[] = array('slider' => $slider,'success'=>'1');

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function latest_movies()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $home_sections = HomeSection::findOrFail('1');

        foreach(explode(",",$home_sections->section1_latest_movie) as $latest_movie)
        {   
             if(Movies::getMoviesInfo($latest_movie,'status')==1) 
             {
                $movie_id= Movies::getMoviesInfo($latest_movie,'id');
                $movie_title= Movies::getMoviesInfo($latest_movie,'video_title');
                $movie_poster= URL::to('upload/source/'.Movies::getMoviesInfo($latest_movie,'video_image_thumb'));
                $movie_duration= Movies::getMoviesInfo($latest_movie,'duration');
                $movie_access=Movies::getMoviesInfo($latest_movie,'video_access');

                $response[]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
              }
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function latest_shows()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $home_sections = HomeSection::findOrFail('1');

        foreach(explode(",",$home_sections->section2_latest_series) as $latest_series)
        {   
            if(Series::getSeriesInfo($latest_series,'status')==1)
            { 
                $show_id= Series::getSeriesInfo($latest_series,'id');
                $show_title= Series::getSeriesInfo($latest_series,'series_name');
                $show_poster= URL::to('upload/source/'.Series::getSeriesInfo($latest_series,'series_poster'));
                
                $response[]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);
            }
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function popular_movies()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $home_sections = HomeSection::findOrFail('1');

        foreach(explode(",",$home_sections->section3_popular_movie) as $popular_movie)
        {   
             if(Movies::getMoviesInfo($popular_movie,'status')==1) 
             {
                $movie_id= Movies::getMoviesInfo($popular_movie,'id');
                $movie_title= Movies::getMoviesInfo($popular_movie,'video_title');
                $movie_poster= URL::to('upload/source/'.Movies::getMoviesInfo($popular_movie,'video_image_thumb'));
                $movie_duration= Movies::getMoviesInfo($popular_movie,'duration');
                $movie_access=Movies::getMoviesInfo($popular_movie,'video_access');

                $response[]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
              }
        }
 

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function popular_shows()
    {  
        $get_data=checkSignSalt($_POST['data']);

        $home_sections = HomeSection::findOrFail('1');

        foreach(explode(",",$home_sections->section3_popular_series) as $popular_series)
        {   
            if(Series::getSeriesInfo($popular_series,'status')==1)
            { 
                $show_id= Series::getSeriesInfo($popular_series,'id');
                $show_title= Series::getSeriesInfo($popular_series,'series_name');
                $show_poster= URL::to('upload/source/'.Series::getSeriesInfo($popular_series,'series_poster'));
                
                $response[]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);
            }
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }


    public function languages()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $lang_list = Language::where('status',1)->orderby('id')->get();

        foreach($lang_list as $lang_data)
        {
                $language_id= $lang_data->id;
                $language_name= $lang_data->language_name;                 
                $language_image= URL::to('upload/source/'.$lang_data->language_image);
                
                $response[]=array("language_id"=>$language_id,"language_name"=>$language_name,"language_image"=>$language_image);   
        }    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function genres()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $genres_list = Genres::where('status',1)->orderby('id')->get();  

        foreach($genres_list as $genres_data)
        {
                $genre_id= $genres_data->id;
                $genre_name= $genres_data->genre_name;                 
                $genre_image= URL::to('upload/source/'.$genres_data->genres_image);
                
                $response[]=array("genre_id"=>$genre_id,"genre_name"=>$genre_name,"genre_image"=>$genre_image);   
        }    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }
    
    public function shows_by_language()
    {
            $get_data=checkSignSalt($_POST['data']);

            $series_lang_id = $get_data['lang_id'];

            if(isset($get_data['filter']))
            {
                $keyword = $get_data['filter'];  

                if($keyword=='old')
                {
                    $series_list = Series::where('status',1)->where('series_lang_id',$series_lang_id)->orderBy('id','ASC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else if($keyword=='alpha')
                {
                    $series_list = Series::where('status',1)->where('series_lang_id',$series_lang_id)->orderBy('series_name','ASC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else if($keyword=='rand')
                {
                    $series_list = Series::where('status',1)->where('series_lang_id',$series_lang_id)->inRandomOrder()->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else
                {
                    $series_list = Series::where('status',1)->where('series_lang_id',$series_lang_id)->orderBy('id','DESC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                
            }
            else
            {  
              $series_list = Series::where('status',1)->where('series_lang_id',$series_lang_id)->orderBy('id','DESC')->paginate(12);

            }


            $total_records=Series::where('status',1)->where('series_lang_id',$series_lang_id)->count();

           if($series_list->count()) 
           { 
                foreach($series_list as $series_data)
                {   
                        $show_id= $series_data->id;
                        $show_title=  $series_data->series_name;
                        $show_poster=  URL::to('upload/source/'.$series_data->series_poster);
                        
                        $response[]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);            
                }
           }
           else
           {
                $response=array();
           }

            return \Response::json(array(            
                'VIDEO_STREAMING_APP' => $response,
                'total_records' => $total_records,
                'status_code' => 200
            ));
    }

    public function shows_by_genre()
    {
           $get_data=checkSignSalt($_POST['data']);

            $series_genres_id = $get_data['genre_id'];


            if(isset($get_data['filter']))
            {
                $keyword = $get_data['filter'];  
 
                if($keyword=='old')
                {
                    $series_list = Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','ASC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else if($keyword=='alpha')
                {
                    $series_list = Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('series_name','ASC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else if($keyword=='rand')
                {
                    $series_list = Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->inRandomOrder()->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                else
                {
                    $series_list = Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','DESC')->paginate(12);
                    $series_list->appends(\Request::only('filter'))->links();
                }
                
            }
            else
            {  
              $series_list = Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','DESC')->paginate(12);

            }


            $total_records=Series::where('status',1)->whereRaw("find_in_set('$series_genres_id',series_genres)")->count();

           if($series_list->count()) 
           { 
                foreach($series_list as $series_data)
                {   
                        $show_id= $series_data->id;
                        $show_title=  $series_data->series_name;
                        $show_poster=  URL::to('upload/source/'.$series_data->series_poster);
                        
                        $response[]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);            
                }
           }
           else
           {
                $response=array();
           }

            return \Response::json(array(            
                'VIDEO_STREAMING_APP' => $response,
                'total_records' => $total_records,
                'status_code' => 200
            ));
    }

    public function shows()
    {  
        $get_data=checkSignSalt($_POST['data']);

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $series_list = Series::where('status',1)->orderBy('id','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $series_list = Series::where('status',1)->orderBy('series_name','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $series_list = Series::where('status',1)->inRandomOrder()->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $series_list = Series::where('status',1)->orderBy('id','DESC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {  
          $series_list = Series::where('status','1')->orderBy('id','DESC')->paginate(12);

        }



        $total_records=Series::where('status','1')->count();

       if($series_list->count()) 
       { 
            foreach($series_list as $series_data)
            {   
                    $show_id= $series_data->id;
                    $show_title=  $series_data->series_name;
                    $show_poster=  URL::to('upload/source/'.$series_data->series_poster);
                    
                    $response[]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);            
            }
       }
       else
       {
            $response=array();
       }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function show_details()
    {
        $get_data=checkSignSalt($_POST['data']);

        $series_id=$get_data['show_id'];

        $series_info = Series::where('status',1)->where('id',$series_id)->first();

        $show_poster=  $series_info->series_poster?URL::to('upload/source/'.$series_info->series_poster):"";

        $show_lang=Language::getLanguageInfo($series_info->series_lang_id,'language_name');

        //Genres List
        $series_genres_ids= $series_info->series_genres;
        foreach(explode(',',$series_genres_ids) as $genres_ids)
        {   
            $genre_name= Genres::getGenresInfo($genres_ids,'genre_name');
            $genre_list[]=array('genre_id'=>$genres_ids,'genre_name'=>$genre_name);
        }

        $imdb_rating=$series_info->imdb_rating?$series_info->imdb_rating:"";

        $response=array("show_id"=>$series_info->id,"show_name"=>$series_info->series_name,"show_info"=>$series_info->series_info,"imdb_rating"=>$imdb_rating,"show_poster"=>$show_poster,'show_lang'=>$show_lang,"genre_list"=>$genre_list); 

        //Season List
        $season_list = Season::where('status',1)->where('series_id',$series_id)->get();

        if($season_list->count()) 
       { 
            foreach($season_list as $season_data)
            {   
                    $season_id= $season_data->id;
                    $season_name=  $season_data->season_name;
                    $season_poster=  URL::to('upload/source/'.$season_data->season_poster);
                    
                    $response['season_list'][]=array("season_id"=>$season_id,"season_name"=>$season_name,"season_poster"=>$season_poster);            
            }
       }
       else
       {
            $response['season_list']=array();
       }


       //Related Shows 
       $series_list = Series::where('status','1')->where('id',"!=",$series_info->id)->where('series_lang_id',$series_info->series_lang_id)->orderBy('id','DESC')->take(5)->get();

       if($series_list->count()) 
       { 
            foreach($series_list as $series_data)
            {   
                    $show_id= $series_data->id;
                    $show_title=  $series_data->series_name;
                    $show_poster=  URL::to('upload/source/'.$series_data->series_poster);
                    
                    $response['related_shows'][]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);            
            }
       }
       else
       {
            $response['related_shows']=array();
       }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,             
            'status_code' => 200
        ));
    }

    public function seasons()
    {
        $get_data=checkSignSalt($_POST['data']);

        $series_id=$get_data['show_id'];

        $season_list = Season::where('status',1)->where('series_id',$series_id)->get();

        if($season_list->count()) 
       { 
            foreach($season_list as $season_data)
            {   
                    $season_id= $season_data->id;
                    $season_name=  $season_data->season_name;
                    $season_poster=  URL::to('upload/source/'.$season_data->season_poster);
                    
                    $response[]=array("season_id"=>$season_id,"season_name"=>$season_name,"season_poster"=>$season_poster);            
            }
       }
       else
       {
            $response=array();
       }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,             
            'status_code' => 200
        ));
    }

    public function episodes()
    {
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        if($user_id!='')
        {
            $user_plan_status= check_app_user_plan($user_id);
        }
        else
        {
            $user_plan_status=false;
        }
        

        $season_id=$get_data['season_id'];

        $episode_list = Episodes::where('status',1)->where('episode_season_id',$season_id)->paginate(4);

       if($episode_list->count()) 
       { 
            foreach($episode_list as $episode_data)
            {   
                     
                    $episode_id= $episode_data->id;
                    $episode_title=  $episode_data->video_title;
                    $episode_image=  URL::to('upload/source/'.$episode_data->video_image);
                    $video_access=  $episode_data->video_access;
                    $description=  stripslashes($episode_data->video_description);
                    
                    $duration=  $episode_data->duration;
                    $release_date= isset($episode_data->release_date) ? date('M d Y',$episode_data->release_date) : '';

                    $video_type=  $episode_data->video_type;

                    $imdb_rating=$episode_data->imdb_rating?$episode_data->imdb_rating:"";

                    if($video_type=="Local")
                    {
                        $video_url=  $episode_data->video_url?URL::to('upload/source/'.$episode_data->video_url):"";
                    }
                    else
                    {
                        $video_url=  $episode_data->video_url?$episode_data->video_url:"";
                    }

                    //$video_url=  $episode_data->video_url;

                    $download_enable=  $episode_data->download_enable?'true':'false';
                    $download_url=  $episode_data->download_url?$episode_data->download_url:"";

                    $series_name= Series::getSeriesInfo($episode_data->episode_series_id,'series_name');
                    $season_name= Season::getSeasonInfo($episode_data->episode_season_id,'season_name');

                    $series_lang_id= Series::getSeriesInfo($episode_data->episode_series_id,'series_lang_id');

                    //Genres List
                    $series_genres_ids= Series::getSeriesInfo($episode_data->episode_series_id,'series_genres');
                    foreach(explode(',',$series_genres_ids) as $genres_ids)
                    {   
                        $genre_name= Genres::getGenresInfo($genres_ids,'genre_name');
                        $genre_list[]=$genre_name;
                    }

                    $language_name= Language::getLanguageInfo($series_lang_id,'language_name');
                    
                    $response[]=array("episode_id"=>$episode_id,"episode_title"=>$episode_title,"episode_image"=>$episode_image,"video_access"=>$video_access,"description"=>$description,"duration"=>$duration,"release_date"=>$release_date,"imdb_rating"=>$imdb_rating,'video_type'=>$video_type,'video_url'=>$video_url,'lang_id'=>$series_lang_id,'language_name'=>$language_name,'genre_list'=>$genre_list,"series_name"=>$series_name,"season_name"=>$season_name,"download_enable"=>$download_enable,"download_url"=>$download_url);     

                    unset($genre_list);       
            }
       }
       else
       {
            $response=array();
       }

       $total_records=Episodes::where('status',1)->where('episode_season_id',$season_id)->count();

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,            
            'user_plan_status' => $user_plan_status,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    } 

    public function episodes_recently_watched()
    {
        $get_data=checkSignSalt($_POST['data']);

        //Recently Watched
        if(isset($get_data['user_id']) && $get_data['user_id']!="")
        {
             $current_user_id=$get_data['user_id'];
             $video_id=$get_data['episode_id'];

             $recently_video_count = RecentlyWatched::where('video_type','Episodes')->where('user_id',$current_user_id)->where('video_id',$video_id)->count();

            if($recently_video_count <=0)
            {
                //Current user recently count
                $current_user_video_count = RecentlyWatched::where('user_id',$current_user_id)->count();

                if($current_user_video_count == 10)
                {   
                    DB::table("recently_watched")
                    ->where("user_id", "=", $current_user_id)
                    ->orderBy("id", "ASC")
                    ->take(1)
                    ->delete();

                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Episodes';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
                else
                {
                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Episodes';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
            } 

            $response=array('success'=>true);

        }
        else
        {
            $response=array('success'=>true);
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
             'status_code' => 200
        ));

    }
 
    public function movies()
    {   
        $get_data=checkSignSalt($_POST['data']);

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->orderBy('id','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->orderBy('video_title','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->inRandomOrder()->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->orderBy('id','DESC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $movies_list = Movies::where('status',1)->orderBy('id','DESC')->paginate(12);   
        }

      $total_records=Movies::where('status','1')->count();

      if($movies_list->count()) 
       {
            foreach($movies_list  as $movie_data)
            {   
                  
                    $movie_id= $movie_data->id;
                    $movie_title= $movie_data->video_title; 
                    $movie_poster= URL::to('upload/source/'.$movie_data->video_image_thumb);
                    $movie_duration= $movie_data->duration;
                    $movie_access= $movie_data->video_access;

                    $response[]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function movies_by_language()
    {

        $get_data=checkSignSalt($_POST['data']);

        $movie_lang_id = $get_data['lang_id'];

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->where('movie_lang_id',$movie_lang_id)->orderBy('id','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->where('movie_lang_id',$movie_lang_id)->orderBy('video_title','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->where('movie_lang_id',$movie_lang_id)->inRandomOrder()->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->where('movie_lang_id',$movie_lang_id)->orderBy('id','DESC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $movies_list = Movies::where('status',1)->where('movie_lang_id',$movie_lang_id)->orderBy('id','DESC')->paginate(12);   
        }

      $total_records=Movies::where('status','1')->where('movie_lang_id',$movie_lang_id)->count();

      if($movies_list->count()) 
       {
            foreach($movies_list  as $movie_data)
            {   
                  
                    $movie_id= $movie_data->id;
                    $movie_title= $movie_data->video_title; 
                    $movie_poster= URL::to('upload/source/'.$movie_data->video_image_thumb);
                    $movie_duration= $movie_data->duration;
                    $movie_access= $movie_data->video_access;

                    $response[]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));

    }

    public function movies_by_genre()
    {

        $get_data=checkSignSalt($_POST['data']);

        $movie_genre_id = $get_data['genre_id'];

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->orderBy('id','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->orderBy('video_title','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->inRandomOrder()->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->orderBy('id','DESC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $movies_list = Movies::where('status',1)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->orderBy('id','DESC')->paginate(12);
        }

       $total_records=Movies::where('status','1')->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->count();

      if($movies_list->count()) 
       {
            foreach($movies_list  as $movie_data)
            {   
                  
                    $movie_id= $movie_data->id;
                    $movie_title= $movie_data->video_title; 
                    $movie_poster= URL::to('upload/source/'.$movie_data->video_image_thumb);
                    $movie_duration= $movie_data->duration;
                    $movie_access= $movie_data->video_access;

                    $response[]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));

    }

    public function movies_details()
    {
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        if($user_id!="")
        {
            $user_plan_status= check_app_user_plan($user_id);
        }
        else
        {
            $user_plan_status=false;
        }
 

        $movie_id=$get_data['movie_id'];
        $movies_info = Movies::where('id',$movie_id)->first();  
 
        $movie_id= $movies_info->id;
        $movie_title=  $movies_info->video_title;
        $movie_image=  URL::to('upload/source/'.$movies_info->video_image);
        $movie_access=  $movies_info->video_access;
        $description=  stripslashes($movies_info->video_description);
        
        $duration=  $movies_info->duration;
        $release_date= isset($movies_info->release_date) ? date('M d Y',$movies_info->release_date) : '';

        $imdb_rating=$movies_info->imdb_rating?$movies_info->imdb_rating:"";

        $video_type=  $movies_info->video_type;
        
        if($video_type=="Local")
        {
            

            $video_url=  $movies_info->video_url?URL::to('upload/source/'.$movies_info->video_url):"";
        }
        else
        {
            $video_url=  $movies_info->video_url?$movies_info->video_url:"";
        }
        

        $download_enable=  $movies_info->download_enable?'true':'false';
        $download_url=  $movies_info->download_url?$movies_info->download_url:"";

        $movie_lang_id= $movies_info->movie_lang_id;
         
        //Genres List
        $movies_genres_ids= $movies_info->movie_genre_id;
        foreach(explode(',',$movies_genres_ids) as $genres_ids)
        {   
            $genre_name= Genres::getGenresInfo($genres_ids,'genre_name');
            $genre_list[]=array('genre_id'=>$genres_ids,'genre_name'=>$genre_name);
        }

        $language_name= Language::getLanguageInfo($movie_lang_id,'language_name');
        
        $response=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_image"=>$movie_image,"movie_access"=>$movie_access,"description"=>$description,"movie_duration"=>$duration,"release_date"=>$release_date,"imdb_rating"=>$imdb_rating,"video_type"=>$video_type,"video_url"=>$video_url,"download_enable"=>$download_enable,"download_url"=>$download_url,'lang_id'=>$movie_lang_id,'language_name'=>$language_name,'genre_list'=>$genre_list);    

        //Latest Movies List
        /*$latest_movies_list = Movies::where('status',1)->where('id','!=',$movie_id)->orderBy('id','DESC')->take(4)->get();
 
           if($latest_movies_list->count()) 
           { 
                foreach($latest_movies_list as $latest_movies_data)
                {   
                    $l_movie_id= $latest_movies_data->id;
                    $l_movie_title=  $latest_movies_data->video_title;
                    $l_movie_poster=  URL::to('upload/source/'.$latest_movies_data->video_image_thumb);
                    $l_movie_access=  $latest_movies_data->video_access;
                    $l_duration=  $latest_movies_data->duration;

                    $response['latest_movies'][]=array("movie_id"=>$l_movie_id,"movie_title"=>$l_movie_title,"movie_poster"=>$l_movie_poster,"movie_duration"=>$l_duration,"movie_access"=>$l_movie_access);            
                }
           }
           else
           {
                   $response['latest_movies']=array();
           }*/

        //Related Movies List
        $related_movies_list = Movies::where('status',1)->where('id','!=',$movie_id)->where('movie_lang_id',$movies_info->movie_lang_id)->orderBy('id','DESC')->get();     

        if($related_movies_list->count()) 
           { 
                foreach($related_movies_list as $related_movies_data)
                {   
                    $r_movie_id= $related_movies_data->id;
                    $r_movie_title=  $related_movies_data->video_title;
                    $r_movie_poster=  URL::to('upload/source/'.$related_movies_data->video_image_thumb);
                    $r_movie_access=  $related_movies_data->video_access;
                    $r_duration=  $related_movies_data->duration;

                    $response['related_movies'][]=array("movie_id"=>$r_movie_id,"movie_title"=>$r_movie_title,"movie_poster"=>$r_movie_poster,"movie_duration"=>$r_duration,"movie_access"=>$r_movie_access);            
                }
           }
           else
           {
                   $response['related_movies']=array();
           }
        
        //Recently Watched
        if(isset($get_data['user_id']) && $get_data['user_id']!="")
        {
             $current_user_id=$get_data['user_id'];
             $video_id=$movies_info->id;

             $recently_video_count = RecentlyWatched::where('video_type','Movies')->where('user_id',$current_user_id)->where('video_id',$video_id)->count();

            if($recently_video_count <=0)
            {
                //Current user recently count
                $current_user_video_count = RecentlyWatched::where('user_id',$current_user_id)->count();

                if($current_user_video_count == 10)
                {   
                    DB::table("recently_watched")
                    ->where("user_id", "=", $current_user_id)
                    ->orderBy("id", "ASC")
                    ->take(1)
                    ->delete();

                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Movies';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
                else
                {
                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Movies';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
            } 

        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'user_plan_status'=>$user_plan_status,
            'status_code' => 200
        ));
    }

    public function sports_category()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $cat_list = SportsCategory::where('status',1)->orderby('id')->get();

        foreach($cat_list as $cat_data)
        {
                $category_id= $cat_data->id;
                $category_name= $cat_data->category_name;                 
                 
                $response[]=array("category_id"=>$category_id,"category_name"=>$category_name);   
        }    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function sports()
    {
        $get_data=checkSignSalt($_POST['data']);

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $sports_video_list = Sports::where('status',1)->orderBy('id','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $sports_video_list = Sports::where('status',1)->orderBy('video_title','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $sports_video_list = Sports::where('status',1)->inRandomOrder()->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $sports_video_list = Sports::where('status',1)->orderBy('id','DESC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $sports_video_list = Sports::where('status',1)->orderBy('id','DESC')->paginate(12);
        }

      $total_records=Sports::where('status','1')->count();

      if($sports_video_list->count()) 
       {
            foreach($sports_video_list  as $sports_data)
            {   
                  
                    $sport_id= $sports_data->id;
                    $sport_title= $sports_data->video_title; 
                    $sport_poster= URL::to('upload/source/'.$sports_data->video_image);
                    $sport_duration= $sports_data->duration;
                    $sport_access= $sports_data->video_access;

                    $response[]=array("sport_id"=>$sport_id,"sport_title"=>$sport_title,"sport_image"=>$sport_poster,"sport_duration"=>$sport_duration,"sport_access"=>$sport_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function sports_by_category()
    {
        $get_data=checkSignSalt($_POST['data']);

        $sports_cat_id = $get_data['category_id'];

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$sports_cat_id)->orderBy('id','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$sports_cat_id)->orderBy('video_title','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$sports_cat_id)->inRandomOrder()->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$sports_cat_id)->orderBy('id','DESC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$sports_cat_id)->orderBy('id','DESC')->paginate(12);
        }

      $total_records=Sports::where('status','1')->where('sports_cat_id',$sports_cat_id)->count();

      if($sports_video_list->count()) 
       {
            foreach($sports_video_list  as $sports_data)
            {   
                  
                    $sport_id= $sports_data->id;
                    $sport_title= $sports_data->video_title; 
                    $sport_poster= URL::to('upload/source/'.$sports_data->video_image);
                    $sport_duration= $sports_data->duration;
                    $sport_access= $sports_data->video_access;

                    $response[]=array("sport_id"=>$sport_id,"sport_title"=>$sport_title,"sport_image"=>$sport_poster,"sport_duration"=>$sport_duration,"sport_access"=>$sport_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function sports_details()
    {
        $get_data=checkSignSalt($_POST['data']);

        $user_id=$get_data['user_id'];

        if($user_id!="")
        {
            $user_plan_status= check_app_user_plan($user_id);
        }
        else
        {
            $user_plan_status=false;
        }

        $sport_id=$get_data['sport_id'];
        $sports_info = Sports::where('id',$sport_id)->first();  
 
        $sport_id= $sports_info->id;
        $sport_title=  $sports_info->video_title;
        $sport_image=  URL::to('upload/source/'.$sports_info->video_image);
        $sport_access=  $sports_info->video_access;
        $description=  stripslashes($sports_info->video_description);
        
        $duration=  $sports_info->duration;
        $date= isset($sports_info->date) ? date('M d Y',$sports_info->date) : '';

        $video_type=  $sports_info->video_type;

        if($video_type=="Local")
        {
           $video_url=  $sports_info->video_url?URL::to('upload/source/'.$sports_info->video_url):"";
        }
        else
        {
            $video_url=  $sports_info->video_url?$sports_info->video_url:"";
        }

         

        $download_enable=  $sports_info->download_enable?'true':'false';
        $download_url=  $sports_info->download_url?$sports_info->download_url:"";

        $sport_cat_id= $sports_info->sports_cat_id;
         
         

        $category_name= SportsCategory::getSportsCategoryInfo($sport_cat_id,'category_name');
        
        $response=array("sport_id"=>$sport_id,"sport_title"=>$sport_title,"sport_image"=>$sport_image,"sport_access"=>$sport_access,"description"=>$description,"sport_duration"=>$duration,"date"=>$date,"video_type"=>$video_type,"video_url"=>$video_url,'sport_cat_id'=>$sport_cat_id,'category_name'=>$category_name,'download_enable'=>$download_enable,'download_url'=>$download_url);    

         
        //Related Movies List
        $related_sports_list = Sports::where('status',1)->where('id','!=',$sport_id)->where('sports_cat_id',$sport_cat_id)->orderBy('id','DESC')->get();

        if($related_sports_list->count()) 
           { 
                foreach($related_sports_list as $related_sports_data)
                {   
                    $l_sport_id= $related_sports_data->id;
                    $l_sport_title=  $related_sports_data->video_title;
                    $l_sport_poster=  URL::to('upload/source/'.$related_sports_data->video_image);
                    $l_sport_access=  $related_sports_data->video_access;
                    $l_sport_duration=  $related_sports_data->duration;

                    $response['related_sports'][]=array("sport_id"=>$l_sport_id,"sport_title"=>$l_sport_title,"sport_image"=>$l_sport_poster,"sport_access"=>$l_sport_access,"sport_duration"=>$l_sport_duration);            
                }
           }
           else
           {
                   $response['related_sports']=array();
           }
        
        //Recently Watched
        if(isset($get_data['user_id']) && $get_data['user_id']!="")
        {
             $current_user_id=$get_data['user_id'];
             $video_id=$sports_info->id;

             $recently_video_count = RecentlyWatched::where('video_type','Sports')->where('user_id',$current_user_id)->where('video_id',$video_id)->count();

            if($recently_video_count <=0)
            {
                //Current user recently count
                $current_user_video_count = RecentlyWatched::where('user_id',$current_user_id)->count();

                if($current_user_video_count == 10)
                {   
                    DB::table("recently_watched")
                    ->where("user_id", "=", $current_user_id)
                    ->orderBy("id", "ASC")
                    ->take(1)
                    ->delete();

                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Sports';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
                else
                {
                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Sports';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
            } 

        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'user_plan_status' => $user_plan_status,
             'status_code' => 200
        ));
    }

    public function livetv_category()
    {   
        $get_data=checkSignSalt($_POST['data']);

        $cat_list = TvCategory::where('status',1)->orderby('category_name')->get();

        foreach($cat_list as $cat_data)
        {
                $category_id= $cat_data->id;
                $category_name= $cat_data->category_name;                 
                 
                $response[]=array("category_id"=>$category_id,"category_name"=>$category_name);   
        }    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'status_code' => 200
        ));
    }

    public function livetv()
    {
        $get_data=checkSignSalt($_POST['data']);

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $live_tv_list = LiveTV::where('status',1)->orderBy('id','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $live_tv_list = LiveTV::where('status',1)->orderBy('channel_name','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $live_tv_list = LiveTV::where('status',1)->inRandomOrder()->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $live_tv_list = LiveTV::where('status',1)->orderBy('id','DESC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $live_tv_list = LiveTV::where('status',1)->orderBy('id','DESC')->paginate(12);
        }

      $total_records=LiveTV::where('status','1')->count();

       if($live_tv_list->count()) 
       {
            foreach($live_tv_list  as $live_tv_data)
            {   
                  
                    $tv_id= $live_tv_data->id;
                    $tv_title= $live_tv_data->channel_name; 
                    $tv_logo= URL::to('upload/source/'.$live_tv_data->channel_thumb);
                    $tv_access= $live_tv_data->channel_access;

                    $response[]=array("tv_id"=>$tv_id,"tv_title"=>$tv_title,"tv_logo"=>$tv_logo,"tv_access"=>$tv_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function livetv_by_category()
    {
        $get_data=checkSignSalt($_POST['data']);

        $channel_cat_id = $get_data['category_id'];

        if(isset($get_data['filter']))
        {
            $keyword = $get_data['filter'];  

            if($keyword=='old')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$channel_cat_id)->orderBy('id','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$channel_cat_id)->orderBy('channel_name','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$channel_cat_id)->inRandomOrder()->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$channel_cat_id)->orderBy('id','DESC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$channel_cat_id)->orderBy('id','DESC')->paginate(12);
        }

      $total_records=LiveTV::where('status','1')->where('channel_cat_id',$channel_cat_id)->count();

      if($live_tv_list->count()) 
       {
            foreach($live_tv_list  as $live_tv_data)
            {   
                  
                    $tv_id= $live_tv_data->id;
                    $tv_title= $live_tv_data->channel_name; 
                    $tv_logo= URL::to('upload/source/'.$live_tv_data->channel_thumb);
                    $tv_access= $live_tv_data->channel_access;

                    $response[]=array("tv_id"=>$tv_id,"tv_title"=>$tv_title,"tv_logo"=>$tv_logo,"tv_access"=>$tv_access);
                   
            }
        }
        else
        {
            $response=array();
        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'total_records' => $total_records,
            'status_code' => 200
        ));
    }

    public function livetv_details()
    {
        $get_data=checkSignSalt($_POST['data']);


        $user_id=$get_data['user_id'];

        if($user_id!="")
        {
            $user_plan_status= check_app_user_plan($user_id);
        }
        else
        {
            $user_plan_status=false;
        }

        $live_tv_id=$get_data['tv_id'];

        $live_tv_info = LiveTV::where('id',$live_tv_id)->first();  
 
        $tv_id= $live_tv_info->id;
        $tv_title=  stripslashes($live_tv_info->channel_name);
        $tv_logo=  URL::to('upload/source/'.$live_tv_info->channel_thumb);
        $tv_access=  $live_tv_info->channel_access;
        $description=  stripslashes($live_tv_info->channel_description);        
         
        $tv_url_type=  $live_tv_info->channel_url_type;
        //$tv_url=  $live_tv_info->channel_url;

        $tv_url=  $live_tv_info->channel_url?$live_tv_info->channel_url:"";

         
        $tv_cat_id= $live_tv_info->channel_cat_id;
         
         

        $category_name= TvCategory::getTvCategoryInfo($tv_cat_id,'category_name');
        
        $response=array("tv_id"=>$tv_id,"tv_title"=>$tv_title,"tv_logo"=>$tv_logo,"tv_access"=>$tv_access,"description"=>$description,"tv_url_type"=>$tv_url_type,"tv_url"=>$tv_url,'tv_cat_id'=>$tv_cat_id,'category_name'=>$category_name);    

         
        //Related Live TV List
        $related_live_tv_list = LiveTV::where('status',1)->where('id','!=',$live_tv_id)->where('channel_cat_id',$tv_cat_id)->orderBy('id','DESC')->get();

           if($related_live_tv_list->count()) 
           { 
                foreach($related_live_tv_list as $related_livetv_data)
                {    
                    $l_tv_id= $related_livetv_data->id;
                    $l_tv_title= $related_livetv_data->channel_name; 
                    $l_tv_logo= URL::to('upload/source/'.$related_livetv_data->channel_thumb);
                    $l_tv_access= $related_livetv_data->channel_access;

                    $response['related_live_tv'][]=array("tv_id"=>$l_tv_id,"tv_title"=>$l_tv_title,"tv_logo"=>$l_tv_logo,"tv_access"=>$l_tv_access);         
                }
           }
           else
           {
                   $response['related_live_tv']=array();
           }
        
        //Recently Watched
        if(isset($get_data['user_id']) && $get_data['user_id']!="")
        {
             $current_user_id=$get_data['user_id'];
             $video_id=$live_tv_info->id;

             $recently_video_count = RecentlyWatched::where('video_type','LiveTV')->where('user_id',$current_user_id)->where('video_id',$video_id)->count();

            if($recently_video_count <=0)
            {
                //Current user recently count
                $current_user_video_count = RecentlyWatched::where('user_id',$current_user_id)->count();

                if($current_user_video_count == 10)
                {   
                    DB::table("recently_watched")
                    ->where("user_id", "=", $current_user_id)
                    ->orderBy("id", "ASC")
                    ->take(1)
                    ->delete();

                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'LiveTV';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
                else
                {
                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'LiveTV';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
            } 

        }

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
            'user_plan_status' =>$user_plan_status,
             'status_code' => 200
        ));
    }

    public function search()
    {
        $get_data=checkSignSalt($_POST['data']);
 
        $keyword = $get_data['search_text'];  
        
        //Movie Data
        $movies_list = Movies::where('status',1)->where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->get();

           if($movies_list->count()) 
           {
                foreach($movies_list  as $movie_data)
                {   
                      
                        $movie_id= $movie_data->id;
                        $movie_title= $movie_data->video_title; 
                        $movie_poster= URL::to('upload/source/'.$movie_data->video_image_thumb);
                        $movie_duration= $movie_data->duration;
                        $movie_access= $movie_data->video_access;

                        $response['movies'][]=array("movie_id"=>$movie_id,"movie_title"=>$movie_title,"movie_poster"=>$movie_poster,"movie_duration"=>$movie_duration,"movie_access"=>$movie_access);
                       
                }
            }
            else
            {
                $response['movies']=array();
            }

        //Movie End

        //Show Start
        $series_list = Series::where('status',1)->where("series_name", "LIKE","%$keyword%")->orderBy('series_name')->get();

           if($series_list->count()) 
           { 
                foreach($series_list as $series_data)
                {   
                        $show_id= $series_data->id;
                        $show_title=  $series_data->series_name;
                        $show_poster=  URL::to('upload/source/'.$series_data->series_poster);
                        
                        $response['shows'][]=array("show_id"=>$show_id,"show_title"=>$show_title,"show_poster"=>$show_poster);            
                }
           }
           else
           {
                $response['shows']=array();
           }
        //Show End

        //Sports Start   
        $sports_video_list = Sports::where('status',1)->where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->get();

          if($sports_video_list->count()) 
           {
                foreach($sports_video_list  as $sports_data)
                {   
                      
                        $sport_id= $sports_data->id;
                        $sport_title= $sports_data->video_title; 
                        $sport_poster= URL::to('upload/source/'.$sports_data->video_image);
                        $sport_duration= $sports_data->duration;
                        $sport_access= $sports_data->video_access;

                        $response['sports'][]=array("sport_id"=>$sport_id,"sport_title"=>$sport_title,"sport_image"=>$sport_poster,"sport_duration"=>$sport_duration,"sport_access"=>$sport_access);
                       
                }
            }
            else
            {
                $response['sports']=array();
            }
        //Sports End

        //Live TV Start 
        $live_tv_list = LiveTV::where('status',1)->where("channel_name", "LIKE","%$keyword%")->orderBy('channel_name')->get();

          if($live_tv_list->count()) 
           {
                foreach($live_tv_list  as $live_tv_data)
                {   
                      
                        $tv_id= $live_tv_data->id;
                        $tv_title= $live_tv_data->channel_name; 
                        $tv_logo= URL::to('upload/source/'.$live_tv_data->channel_thumb);
                        $tv_access= $live_tv_data->channel_access;

                        $response['live_tv'][]=array("tv_id"=>$tv_id,"tv_title"=>$tv_title,"tv_logo"=>$tv_logo,"tv_access"=>$tv_access);
                       
                }
            }
            else
            {
                $response['live_tv']=array();
            }
        //Live TV End    

        return \Response::json(array(            
            'VIDEO_STREAMING_APP' => $response,
             'status_code' => 200
        ));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Settings;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
         check_verify_purchase();	
         
    }
    public function general_settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.general');
        
        $settings = Settings::findOrFail('1');
 
        
        return view('admin.pages.general_settings',compact('page_title','settings'));
    }	 
    
    public function update_general_settings(Request $request)
    {  
    	  
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Request::except(array('_token')) ;
	    
	    $rule=array(
		        'site_name' => 'required',
		        'site_logo' => 'required',
                'site_favicon' => 'required',
                'site_email' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();

        putPermanentEnv('APP_TIMEZONE', $inputs['time_zone']);
        putPermanentEnv('APP_LANG', $inputs['default_language']);
 
        $settings->time_zone = $inputs['time_zone'];
        $settings->default_language = $inputs['default_language']; 
        $settings->styling = $inputs['styling']; 
		$settings->site_name = $inputs['site_name']; 
		$settings->site_logo = $inputs['site_logo'];
        $settings->site_favicon = $inputs['site_favicon'];
        $settings->site_email = $inputs['site_email'];  
        $settings->site_description = addslashes($inputs['site_description']);
        $settings->site_keywords = addslashes($inputs['site_keywords']);

        $settings->site_header_code = addslashes($inputs['site_header_code']);
        $settings->site_footer_code = addslashes($inputs['site_footer_code']);
		
        $settings->site_copyright = addslashes($inputs['site_copyright']);


        $settings->footer_fb_link = addslashes($inputs['footer_fb_link']);
        $settings->footer_twitter_link = addslashes($inputs['footer_twitter_link']);
        $settings->footer_instagram_link = addslashes($inputs['footer_instagram_link']);

        $settings->footer_google_play_link = addslashes($inputs['footer_google_play_link']);
        $settings->footer_apple_store_link = addslashes($inputs['footer_apple_store_link']);
        
        $settings->gdpr_cookie_title = addslashes($inputs['gdpr_cookie_title']);
        $settings->gdpr_cookie_text = addslashes($inputs['gdpr_cookie_text']); 
        $settings->gdpr_cookie_url = addslashes($inputs['gdpr_cookie_url']); 

        $settings->external_css_js = $inputs['external_css_js']; 

        $settings->omdb_api_key = trim($inputs['omdb_api_key']); 
		  
	    $settings->save(); 
        
 
	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    
    public function email_settings()
    { 
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.smtp_email');
        
        $settings = Settings::findOrFail('1');
 
        
        return view('admin.pages.email_settings',compact('page_title','settings'));
    }

    public function update_email_settings(Request $request)
    {  
          
        $settings = Settings::findOrFail('1');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'smtp_host' => 'required',
                'smtp_port' => 'required',
                'smtp_email' => 'required',
                'smtp_password' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all();
        
        putPermanentEnv('MAIL_HOST', $inputs['smtp_host']);
        putPermanentEnv('MAIL_PORT', $inputs['smtp_port']);
        putPermanentEnv('MAIL_USERNAME', $inputs['smtp_email']);
        putPermanentEnv('MAIL_PASSWORD', $inputs['smtp_password']);
        putPermanentEnv('MAIL_ENCRYPTION', $inputs['smtp_encryption']);
        
        $settings->smtp_host = $inputs['smtp_host'];
        $settings->smtp_port = $inputs['smtp_port'];
        $settings->smtp_email = $inputs['smtp_email'];
        $settings->smtp_password = $inputs['smtp_password'];
        $settings->smtp_encryption = $inputs['smtp_encryption'];

        $settings->save(); 
 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }

    public function payment_settings()
    { 
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.payment');
        
        $settings = Settings::findOrFail('1');
        
        return view('admin.pages.payment_settings',compact('page_title','settings'));
    }    
    
     
    public function update_payment_settings(Request $request)
    {  
          
        $settings = Settings::findOrFail('1');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'currency_code' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all();
        
        putPermanentEnv('STRIPE_SECRET', $inputs['stripe_secret_key']);
        
        $settings->currency_code = $inputs['currency_code'];

        $settings->paypal_payment_on_off = $inputs['paypal_payment_on_off'];
        $settings->paypal_mode = $inputs['paypal_mode'];
        $settings->paypal_client_id = $inputs['paypal_client_id'];
        $settings->paypal_secret = $inputs['paypal_secret'];

        $settings->stripe_payment_on_off = $inputs['stripe_payment_on_off'];
        $settings->stripe_secret_key = $inputs['stripe_secret_key'];
        $settings->stripe_publishable_key = $inputs['stripe_publishable_key'];

        $settings->razorpay_payment_on_off = $inputs['razorpay_payment_on_off'];
        $settings->razorpay_key = $inputs['razorpay_key'];
        $settings->razorpay_secret = $inputs['razorpay_secret'];


        $settings->save(); 



 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
 
    	
}

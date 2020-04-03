<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Ads;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class AdsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
        check_verify_purchase();
		  
    }
    public function ads_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.ad_management');
              
        $ads_list = Ads::orderBy('id')->paginate(10);
         
        return view('admin.pages.ads_list',compact('page_title','ads_list'));
    }
     
    public function addnew(Request $request)
    {  
         
        $inputs = $request->all();        
         
        $ads_obj = Ads::findOrFail($inputs['id']);
 
 
         $ads_obj->ad_code = $inputs['ad_code'];         
         $ads_obj->status = $inputs['status']; 
         
         $ads_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }  
         
    }     
   
    
    public function ads_edit($ad_id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  
          $page_title=trans('words.ad_edit');

          $ad_info = Ads::findOrFail($ad_id);   

          return view('admin.pages.ads_edit',compact('page_title','ad_info'));
        
    }	 
     
    	
}

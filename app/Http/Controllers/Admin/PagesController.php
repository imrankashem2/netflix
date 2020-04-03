<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Pages;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str; 

class PagesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
         check_verify_purchase();	
         
    }
    public function about_page()
    { 
 
    	if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_info = Pages::findOrFail('1');

        $page_title=trans('words.about_us');
         
        return view('admin.pages.about_page',compact('page_title','page_info'));
    }	 
    
    public function update_about_page(Request $request)
    {  
    	  
    	$page_obj = Pages::findOrFail('1');
 
	    
	    $data =  \Request::except(array('_token')) ;
	    
	    $rule=array(
		        'page_title' => 'required' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all(); 
        
        $page_slug = Str::slug($inputs['page_title'], '-');

		$page_obj->page_title = $inputs['page_title'];
        $page_obj->page_slug = $page_slug; 	 
        $page_obj->page_content = addslashes($inputs['page_content']);
        $page_obj->status = $inputs['status'];       
	    $page_obj->save(); 

 
	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    

    public function terms_page()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_info = Pages::findOrFail('2');

        $page_title=trans('words.terms_of_us');
         
        return view('admin.pages.terms_page',compact('page_title','page_info'));
    }    
    
    public function update_terms_page(Request $request)
    {  
          
        $page_obj = Pages::findOrFail('2');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'page_title' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all(); 
        
        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = $inputs['page_title'];
        $page_obj->page_slug = $page_slug;   
        $page_obj->page_content = addslashes($inputs['page_content']);
        $page_obj->status = $inputs['status'];       
        $page_obj->save(); 

 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    

    public function privacy_policy_page()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_info = Pages::findOrFail('3');

        $page_title=trans('words.privacy_policy');
         
        return view('admin.pages.privacy_policy_page',compact('page_title','page_info'));
    }    
    
    public function update_privacy_policy_page(Request $request)
    {  
          
        $page_obj = Pages::findOrFail('3');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'page_title' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all(); 
        
        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = $inputs['page_title'];
        $page_obj->page_slug = $page_slug;   
        $page_obj->page_content = addslashes($inputs['page_content']);
        $page_obj->status = $inputs['status'];       
        $page_obj->save(); 

 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    } 


    public function faq_page()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_info = Pages::findOrFail('4');

        $page_title=trans('words.faq');
         
        return view('admin.pages.faq_page',compact('page_title','page_info'));
    }    
    
    public function update_faq_page(Request $request)
    {  
          
        $page_obj = Pages::findOrFail('4');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'page_title' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all(); 
        
        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = $inputs['page_title'];
        $page_obj->page_slug = $page_slug;   
        $page_obj->page_content = addslashes($inputs['page_content']);
        $page_obj->status = $inputs['status'];       
        $page_obj->save(); 

 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }

    public function contact_page()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_info = Pages::findOrFail('5');

        $page_title=trans('words.contact_us');
         
        return view('admin.pages.contact_page',compact('page_title','page_info'));
    }    
    
    public function update_contact_page(Request $request)
    {  
          
        $page_obj = Pages::findOrFail('5');
 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'page_title' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all(); 
        
        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = $inputs['page_title'];
        $page_obj->page_slug = $page_slug;   
        $page_obj->page_content = addslashes($inputs['page_content']);
        $page_obj->status = $inputs['status'];       
        $page_obj->save(); 

 
        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    	
}

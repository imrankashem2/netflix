<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\HomeSection;
use App\Language;
use App\Movies;
use App\Series;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class HomeSectionController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
         check_verify_purchase();	
         
    }
    public function home_section()
    { 
    	if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.home_section');
        
        $home_settings = HomeSection::findOrFail('1');
        $language_list = Language::orderBy('language_name')->get();
        $movies_list = Movies::orderBy('id','DESC')->get();
        $series_list = Series::orderBy('id','DESC')->get();
        
        return view('admin.pages.home_section',compact('page_title','language_list','movies_list','series_list','home_settings'));
    }	 
    
    public function update_home_section(Request $request)
    {  
    	  
    	$settings = HomeSection::findOrFail('1');
 
	    
	    $data =  \Request::except(array('_token')) ;
	    
	    $rule=array(
		        'section1_latest_movie' => 'required' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all(); 
       
		$settings->section1_latest_movie = implode(',', $inputs['section1_latest_movie']);
        $settings->section2_latest_series = implode(',', $inputs['section2_latest_series']);

        $settings->section3_popular_movie = implode(',', $inputs['section3_popular_movie']);
        $settings->section3_popular_series = implode(',', $inputs['section3_popular_series']);
        
        $settings->section3_title = $inputs['section3_title']; 
        $settings->section3_type = $inputs['section3_type']; 
        $settings->section3_lang = $inputs['section3_lang']; 

        $settings->section4_title = $inputs['section4_title']; 
        $settings->section4_type = $inputs['section4_type']; 
        $settings->section4_lang = $inputs['section4_lang']; 

        $settings->section5_title = $inputs['section5_title']; 
        $settings->section5_type = $inputs['section5_type']; 
        $settings->section5_lang = $inputs['section5_lang']; 
		 
	    $settings->save(); 

 
	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    
     
    	
}

<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Sports;
use App\SportsCategory;
use App\RecentlyWatched;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class SportsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 
        check_verify_purchase();	
		  
    }
    public function sports_video_list()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }
        
        $page_title=trans('words.sports_video_text');
        
        $cat_list = SportsCategory::orderBy('category_name')->get();      

        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $video_list = Sports::where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->paginate(10);

            $video_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['cat_id']))
        {
            $cat_id = $_GET['cat_id'];
            $video_list = Sports::where("sports_cat_id", "=",$cat_id)->orderBy('id','DESC')->paginate(10);

            $video_list->appends(\Request::only('cat_id'))->links();
        }
        else
        {
            $video_list = Sports::orderBy('id','DESC')->paginate(10);
        } 
         
        return view('admin.pages.sports_video_list',compact('page_title','video_list','cat_list'));
    }
    
    public function addVideo()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }

        $page_title=trans('words.add_video');

        $cat_list = SportsCategory::orderBy('category_name')->get();   
 
        return view('admin.pages.addeditsportsvideo',compact('page_title','cat_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                $rule=array(
                        'video_category' => 'required',
                        'video_title' => 'required',
                        'video_image' => 'required'                
                         );
        }else
        {
            $rule=array(
                        'video_category' => 'required',
                        'video_title' => 'required'                
                         );
        }

         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $video_obj = Sports::findOrFail($inputs['id']);

        }else{

            $video_obj = new Sports;

        }

         $video_slug = Str::slug($inputs['video_title'], '-');

         
   
         $video_obj->video_access = $inputs['video_access'];
         $video_obj->sports_cat_id = $inputs['video_category'];
         $video_obj->video_title = addslashes($inputs['video_title']);
         $video_obj->video_slug = $video_slug;
         $video_obj->video_description = addslashes($inputs['video_description']);

         $video_obj->date = strtotime($inputs['date']);
         $video_obj->duration = $inputs['duration'];


         $video_obj->video_type = $inputs['video_type'];

         if($inputs['video_type']=="URL")
         {
            $video_url=$inputs['video_url'];
         }
         else if($inputs['video_type']=="Embed")
         {
            $video_url=$inputs['video_embed_code'];
         }
         else
         {
            $video_url=$inputs['video_url_local'];
         }

         $video_obj->video_url = $video_url;

         $video_obj->video_image = $inputs['video_image'];
         $video_obj->status = $inputs['status'];  

         if(isset($inputs['download_enable']))
         {
            $video_obj->download_enable = $inputs['download_enable'];  
            $video_obj->download_url = $inputs['download_url'];  
         }
         

         $video_obj->seo_title = addslashes($inputs['seo_title']);  
         $video_obj->seo_description = addslashes($inputs['seo_description']);  
         $video_obj->seo_keyword = addslashes($inputs['seo_keyword']);  
         
         $video_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editVideo($sport_id)    
    {      
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }

          $page_title=trans('words.edit_video');

          $cat_list = SportsCategory::orderBy('category_name')->get();
          $video_info = Sports::findOrFail($sport_id);   

          return view('admin.pages.addeditsportsvideo',compact('page_title','video_info','cat_list'));
        
    }	 
    
    public function delete($sport_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
       
            $recently = RecentlyWatched::where('video_type','Sports')->where('video_id',$sport_id)->delete(); 	

            $sports = Sports::findOrFail($sport_id);
            $sports->delete();

            \Session::flash('flash_message', trans('words.deleted'));

            return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        
        }
    }

     
     
    	
}

<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Movies;
use App\Genres;
use App\Language;
use App\RecentlyWatched;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class MoviesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase(); 	
		  
    }
    public function movies_list()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('dashboard');
            
         }
        
        $page_title=trans('words.movies_text');
        
        $language_list = Language::orderBy('language_name')->get();      

        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $movies_list = Movies::where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->paginate(10);

            $movies_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['language_id']))
        {
            $language_id = $_GET['language_id'];
            $movies_list = Movies::where("movie_lang_id", "=",$language_id)->orderBy('id','DESC')->paginate(10);

            $movies_list->appends(\Request::only('language_id'))->links();
        }
        else
        {
            $movies_list = Movies::orderBy('id','DESC')->paginate(10);
        } 
         
        return view('admin.pages.movies_list',compact('page_title','movies_list','language_list'));
    }
    
    public function addMovie()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
        }

        $page_title=trans('words.add_movie');

        $language_list = Language::orderBy('language_name')->get();
        $genre_list = Genres::orderBy('genre_name')->get();

        return view('admin.pages.addeditmovie',compact('page_title','language_list','genre_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                $rule=array(
                        'movie_language' => 'required',
                        'genres' => 'required',
                        'video_title' => 'required'
                         );
        }else
        {
            $rule=array(
                        'movie_language' => 'required',
                        'genres' => 'required',
                        'video_title' => 'required',
                        'video_image_thumb' => 'required'                         
                         );
        }

         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $movie_obj = Movies::findOrFail($inputs['id']);

        }else{

            $movie_obj = new Movies;

        }

         $video_slug = Str::slug($inputs['video_title'], '-');
          
   
         $movie_obj->video_access = $inputs['video_access'];
         $movie_obj->movie_lang_id = $inputs['movie_language'];
         $movie_obj->movie_genre_id = implode(',', $inputs['genres']);
         $movie_obj->video_title = addslashes($inputs['video_title']);
         $movie_obj->video_slug = $video_slug;
         $movie_obj->video_description = addslashes($inputs['video_description']);

         $movie_obj->release_date = strtotime($inputs['release_date']);
         $movie_obj->duration = $inputs['duration'];


         $movie_obj->video_type = $inputs['video_type'];

         if($inputs['video_type']=="URL")
         {
            $video_url=$inputs['video_url'];
            $movie_obj->video_image = $inputs['video_image'];
         }
         else if($inputs['video_type']=="Embed")
         {
            $video_url=$inputs['video_embed_code'];
         }
         else
         {
            $video_url=$inputs['video_url_local'];
            $movie_obj->video_image = $inputs['video_image'];
         }

         $movie_obj->video_url = $video_url;

         $movie_obj->video_image_thumb = $inputs['video_image_thumb'];
         $movie_obj->video_image = $inputs['video_image'];

         if(isset($inputs['thumb_link']) && $inputs['thumb_link']!='')
         {
             $image_source           =   $inputs['thumb_link'];
             $save_to                =   'upload/source/'.$inputs['video_image_thumb'];
             grab_image($image_source,$save_to);

 
         }

         $movie_obj->imdb_id = $inputs['imdb_id'];
         $movie_obj->imdb_rating = $inputs['imdb_rating'];
         $movie_obj->imdb_votes = $inputs['imdb_votes'];
         

         $movie_obj->status = $inputs['status'];  

         if(isset($inputs['download_enable']))
         {
            $movie_obj->download_enable = $inputs['download_enable'];  
            $movie_obj->download_url = $inputs['download_url'];  
         }
         

         $movie_obj->seo_title = addslashes($inputs['seo_title']);  
         $movie_obj->seo_description = addslashes($inputs['seo_description']);  
         $movie_obj->seo_keyword = addslashes($inputs['seo_keyword']);  
         
         $movie_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editMovie($movie_id)    
    {      
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
        }  

          $page_title=trans('words.edit_movie');

          $language_list = Language::orderBy('language_name')->get();
          $genre_list = Genres::orderBy('genre_name')->get();

          $movie = Movies::findOrFail($movie_id);   

          return view('admin.pages.addeditmovie',compact('page_title','movie','language_list','genre_list'));
        
    }	 
    
    public function delete($movie_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        
        $recently = RecentlyWatched::where('video_type','Movies')->where('video_id',$movie_id)->delete();
        
        $movie = Movies::findOrFail($movie_id);
        $movie->delete();

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

<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Movies;
use App\Genres;
use App\Language; 
use App\HomeSection;
use App\RecentlyWatched;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class MoviesController extends Controller
{
	  
    public function movies()
    {   
    	if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

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
            
       return view('pages.movies',compact('movies_list'));
         
    }

    public function movies_latest()
    {   
           
       $home_sections = HomeSection::findOrFail('1');

       return view('pages.movies_latest',compact('home_sections'));
         
    }

    public function movies_popular()
    {   
           
       $home_sections = HomeSection::findOrFail('1');

       return view('pages.movies_popular',compact('home_sections'));
         
    }

    public function movies_single($slug,$id)
    {   
    	   
        $movies_info = Movies::where('status',1)->where('id',$id)->first();

       if($movies_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

        //Check user plan
        if($movies_info->video_access=="Paid")
        {
            if(Auth::check())
            {
                if(Auth::User()->usertype !="Admin" AND Auth::User()->usertype !="Sub_Admin")
                {   
                    $user_id=Auth::User()->id;

                    $user_info = User::findOrFail($user_id);
                    $user_plan_id=$user_info->plan_id;
                    $user_plan_exp_date=$user_info->exp_date;

                    if($user_plan_id==0 OR strtotime(date('m/d/Y'))>$user_plan_exp_date)
                    {          
                        //\Session::flash('flash_message', 'Login status reset!');
                        return redirect('membership_plan');
                    }
                }
            }
            else
            {
                \Session::flash('error_flash_message', 'Access denied!');

                return redirect('login');
            }
        }
        

        $latest_movies_list = Movies::where('status',1)->where('id','!=',$id)->orderBy('id','DESC')->take(4)->get();

        $related_movies_list = Movies::where('status',1)->where('id','!=',$id)->where('movie_lang_id',$movies_info->movie_lang_id)->orderBy('id','DESC')->get();       


        //Recently Watched
        if(Auth::check())
        {
             $current_user_id=Auth::User()->id;
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
        return view('pages.movies_single',compact('movies_info','latest_movies_list','related_movies_list')); 
    }         
}
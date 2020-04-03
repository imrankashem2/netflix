<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Series;
use App\Season; 
use App\Episodes; 
use App\HomeSection;
use App\RecentlyWatched;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class SeriesController extends Controller
{
	  
    public function series()
    {   
    	  if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

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
        return view('pages.series',compact('series_list'));
         
    }

    public function series_latest()
    {   
           
       $home_sections = HomeSection::findOrFail('1');

       return view('pages.series_latest',compact('home_sections'));
         
    }

    public function series_popular()
    {   
           
       $home_sections = HomeSection::findOrFail('1');

       return view('pages.series_popular',compact('home_sections'));
         
    }

    public function series_single($slug,$id)
    {   
    	   
       $series_info = Series::where('status',1)->where('id',$id)->first();

       if($series_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $season_list = Season::where('status',1)->where('series_id',$id)->get();

       $series_latest_episode = Episodes::where('status',1)->where('episode_series_id',$series_info->id)->first();  


        return view('pages.series_single',compact('series_info','season_list','series_latest_episode'));
         
    }

    public function season_episodes($series_slug,$season_slug,$id)
    {   
    	   
       $season_info = Season::where('id',$id)->first();
       $episode_list = Episodes::where('status',1)->where('episode_season_id',$id)->get();  

       $series_name= Series::getSeriesInfo($season_info->series_id,'series_name');
       $series_slug= Series::getSeriesInfo($season_info->series_id,'series_slug');


        return view('pages.season_episodes',compact('season_info','episode_list','series_name','series_slug'));
         
    }

    public function episodes_details($series_slug,$season_slug,$id)
    {   
          
       $episode_info = Episodes::where('id',$id)->first();  

       if($episode_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       //Check user plan
        if($episode_info->video_access=="Paid")
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

       $episode_up_next_list = Episodes::where('status',1)->where('id','!=',$id)->where('episode_season_id',$episode_info->episode_season_id)->take(4)->get();

       $series_name= Series::getSeriesInfo($episode_info->episode_series_id,'series_name');
       $series_slug= Series::getSeriesInfo($episode_info->episode_series_id,'series_slug');
       $series_lang_id= Series::getSeriesInfo($episode_info->episode_series_id,'series_lang_id');
       $series_genres_ids= Series::getSeriesInfo($episode_info->episode_series_id,'series_genres');

       $season_name= Season::getSeasonInfo($episode_info->episode_season_id,'season_name');

       $episode_list = Episodes::where('status',1)->where('episode_season_id',$episode_info->episode_season_id)->get();

       $season_list = Season::where('status',1)->where('series_id',$episode_info->episode_series_id)->get();

       //Recently Watched
        if(Auth::check())
        {
             $current_user_id=Auth::User()->id;
             $video_id=$episode_info->id;

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

        }


        return view('pages.episodes_details',compact('episode_info','episode_up_next_list','season_name','series_name','series_slug','series_lang_id','series_genres_ids','episode_list','season_list'));
         
    } 
    
}

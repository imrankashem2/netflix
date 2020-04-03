<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\LiveTV;
use App\TvCategory;
use App\RecentlyWatched;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class LiveTvController extends Controller
{
	  
    public function live_tv_list()
    {   
        if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

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
       return view('pages.livetv',compact('live_tv_list'));
         
    }

    public function live_tv_by_category($slug)
    {  

       $tv_cat_info = TvCategory::where('category_slug',$slug)->first();       
       
       $cat_id=$tv_cat_info->id;       

       if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$cat_id)->orderBy('id','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$cat_id)->orderBy('channel_name','ASC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$cat_id)->inRandomOrder()->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$cat_id)->orderBy('id','DESC')->paginate(12);
                $live_tv_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {

             $live_tv_list = LiveTV::where('status',1)->where('channel_cat_id',$cat_id)->orderBy('id','DESC')->paginate(12);  
        }      
       return view('pages.livetv_by_category',compact('live_tv_list','tv_cat_info'));
         
    }

    public function live_tv_single($slug,$id)
    {   
    	   
        $tv_info = LiveTV::where('id',$id)->first();

        //Check user plan
        if($tv_info->channel_access=="Paid")
        {
            if(Auth::check())
            {
                if(Auth::User()->usertype !="Admin")
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

         
        $related_livetv_list = LiveTV::where('status',1)->where('id','!=',$id)->where('channel_cat_id',$tv_info->channel_cat_id)->orderBy('id','DESC')->get();
 
        //Recently Watched
        if(Auth::check())
        {
             $current_user_id=Auth::User()->id;
             $video_id=$tv_info->id;

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


        return view('pages.livetv_single',compact('tv_info','related_livetv_list')); 
    }

     
    
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Sports;
use App\SportsCategory;
use App\RecentlyWatched;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class SportsController extends Controller
{
	  
    public function sports()
    {   
        if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

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
       return view('pages.sports',compact('sports_video_list'));
         
    }

    public function sports_by_category($slug)
    {  

       $sports_cat_info = SportsCategory::where('category_slug',$slug)->first();       
       
       $cat_id=$sports_cat_info->id;       

       if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$cat_id)->orderBy('id','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$cat_id)->orderBy('video_title','ASC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$cat_id)->inRandomOrder()->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$cat_id)->orderBy('id','DESC')->paginate(12);
                $sports_video_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {

             $sports_video_list = Sports::where('status',1)->where('sports_cat_id',$cat_id)->orderBy('id','DESC')->paginate(12);  
        }      
       return view('pages.sports_by_category',compact('sports_video_list','sports_cat_info'));
         
    }

    public function sports_single($slug,$id)
    {   
    	   
        $sports_info = Sports::where('id',$id)->first();

        //Check user plan
        if($sports_info->video_access=="Paid")
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

        $latest_sports_list = Sports::where('status',1)->where('id','!=',$id)->orderBy('id','DESC')->take(5)->get();
        $related_sports_list = Sports::where('status',1)->where('id','!=',$id)->where('sports_cat_id',$sports_info->sports_cat_id)->orderBy('id','DESC')->get();
 
        //Recently Watched
        if(Auth::check())
        {
             $current_user_id=Auth::User()->id;
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


        return view('pages.sports_single',compact('sports_info','latest_sports_list','related_sports_list')); 
    }

     
    
}

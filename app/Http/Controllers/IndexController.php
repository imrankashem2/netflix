<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Slider;
use App\Series;
use App\Movies;
use App\HomeSection;
use App\Sports;
use App\Pages;
use App\RecentlyWatched;
use App\LiveTV;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class IndexController extends Controller
{
	  
    public function index()
    {   

        if(!$this->alreadyInstalled()) {
            return redirect('public/install');
        }

    	$slider= Slider::where('status',1)->orderby('id','DESC')->get();
        
        if(Auth::check())
        {   
            $current_user_id=Auth::User()->id;
            $recently_watched = RecentlyWatched::where('user_id',$current_user_id)->orderby('id','DESC')->get();
        }
        else
        {
            $recently_watched = array();
        }

        $home_sections = HomeSection::findOrFail('1');

        if($home_sections->section3_type=="Series")
        {   
            $section3_lang_id=$home_sections->section3_lang;
            $home_sections_list3 = Series::where('status',1)->where('series_lang_id',$section3_lang_id)->orderBy('id','DESC')->take(10)->get();
        }
        else
        {
           $section3_lang_id=$home_sections->section3_lang; 
           $home_sections_list3 = Movies::where('status',1)->where('movie_lang_id',$section3_lang_id)->orderBy('id','DESC')->take(10)->get(); 
        }

        if($home_sections->section4_type=="Series")
        {   
            $section4_lang_id=$home_sections->section4_lang;
            $home_sections_list4 = Series::where('status',1)->where('series_lang_id',$section4_lang_id)->orderBy('id','DESC')->take(10)->get();
        }
        else
        {
           $section4_lang_id=$home_sections->section4_lang; 
           $home_sections_list4 = Movies::where('status',1)->where('movie_lang_id',$section4_lang_id)->orderBy('id','DESC')->take(10)->get(); 
        }

        if($home_sections->section5_type=="Series")
        {   
            $section5_lang_id=$home_sections->section5_lang;
            $home_sections_list5 = Series::where('status',1)->where('series_lang_id',$section5_lang_id)->orderBy('id','DESC')->take(10)->get();
        }
        else
        {
           $section5_lang_id=$home_sections->section5_lang; 
           $home_sections_list5 = Movies::where('status',1)->where('movie_lang_id',$section5_lang_id)->orderBy('id','DESC')->take(10)->get(); 
        }

 
        return view('pages.index',compact('slider','recently_watched','home_sections','section3_lang_id','home_sections_list3','section4_lang_id','home_sections_list4','section5_lang_id','home_sections_list5'));
         
    } 


    public function alreadyInstalled()
    {   
        //echo base_path();
        //exit;

        return file_exists(base_path('/public/.lic'));
    }

    public function search()
    {
        $keyword = $_GET['s'];  
        
        $movies_list = Movies::where('status',1)->where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->get();

        $series_list = Series::where('status',1)->where("series_name", "LIKE","%$keyword%")->orderBy('series_name')->get();

        $sports_video_list = Sports::where('status',1)->where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->get();

        $live_tv_list = LiveTV::where('status',1)->where("channel_name", "LIKE","%$keyword%")->orderBy('channel_name')->get();
    
        return view('pages.search',compact('movies_list','series_list','sports_video_list','live_tv_list'));
    }

    public function sitemap()
    {    
        return response()->view('pages.sitemap')->header('Content-Type', 'text/xml');
    }

    public function sitemap_misc()
    {   
        $pages_list = Pages::where('status',1)->orderBy('id')->get();

        return response()->view('pages.sitemap_misc',compact('pages_list'))->header('Content-Type', 'text/xml');
    }
 

    public function sitemap_movies()
    {   
        $movies_list = Movies::where('status',1)->orderBy('id','DESC')->get();

        return response()->view('pages.sitemap_movies',compact('movies_list'))->header('Content-Type', 'text/xml');
    }

    public function sitemap_show()
    {   
        $series_list = Series::where('status',1)->orderBy('id','DESC')->get();

        return response()->view('pages.sitemap_show',compact('series_list'))->header('Content-Type', 'text/xml');
    }

    public function sitemap_sports()
    {   
        $sports_video_list = Sports::where('status',1)->orderBy('id','DESC')->get();

        return response()->view('pages.sitemap_sports',compact('sports_video_list'))->header('Content-Type', 'text/xml');
    }

    public function sitemap_livetv()
    {   
        $live_list = LiveTV::where('status',1)->orderBy('id','DESC')->get();

        return response()->view('pages.sitemap_livetv',compact('live_list'))->header('Content-Type', 'text/xml');
    }

    public function login()
    {
    
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        
  
     /* $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);*/

        $data =  \Request::except(array('_token'));     
                
        $rule=array(
                'email' => 'required|email',
                'password' => 'required'                
                 );
        
        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                Session::flash('login_flash_error', 'required');
                return redirect()->back()->withErrors($validator->messages());
        }

        $credentials = $request->only('email', 'password');

         
        
         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->status=='0'){
                \Auth::logout();
                //return array("errors" => 'You account has been banned!');
                return redirect('/login')->withErrors(trans('words.account_banned'));
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/login')->withErrors(trans('words.email_password_invalid'));
        
    }
    
     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        if(Auth::user()->usertype=='Admin' OR Auth::user()->usertype=='Sub_Admin')
        {
            return redirect('admin/dashboard'); 
        }
        else
        {
            return redirect('dashboard'); 
        }
        
    }
    

    public function signup()
    {  
        return view('pages.signup');
    }

    public function postSignup(Request $request)
    { 
         

        $data =  \Request::except(array('_token'));
        
        $inputs = $request->all();
        
        $rule=array(
                'name' => 'required',                
                'email' => 'required|email|max:200|unique:users',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required'                
                 );
        
        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                Session::flash('signup_flash_error', 'required');
                return redirect()->back()->withErrors($validator->messages());
        } 
          
       
        $user = new User;

        //$confirmation_code = str_random(30);

        
        $user->usertype = 'User';
        $user->name = $inputs['name']; 
        $user->email = $inputs['email'];         
        $user->password= bcrypt($inputs['password']);          
        $user->save();

        //Welcome Email

        if(getenv("MAIL_USERNAME"))
        {
            $user_name=$inputs['name'];
            $user_email=$inputs['email'];

            $data_email = array(
                'name' => $user_name,
                'email' => $user_email
                );    

            \Mail::send('emails.welcome', $data_email, function($message) use ($user_name,$user_email){
                $message->to($user_email, $user_name)
                ->from(getcong('site_email'), getcong('site_name'))
                ->subject('Welcome to '.getcong('site_name'));
            });    
        }        

        
        Session::flash('signup_flash_message', trans('words.account_created_successfully'));

        return redirect('login');

         
    }

    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
     
}

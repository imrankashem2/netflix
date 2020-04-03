<?php
use App\Settings;
use App\Pages;
use App\Transactions;
use App\Episodes;
use App\Movies;
use App\Sports;
use App\RecentlyWatched; 
use App\User;
use App\Ads;
use App\LiveTv; 
 

if (! function_exists('recently_watched_info')) {

    function recently_watched_info($video_type,$video_id)
    {
        if($video_type=="Movies")
        {
            $recently_info = Movies::where('id',$video_id)->first();
        } 
        else if($video_type=="Sports")
        {
            $recently_info = Sports::where('id',$video_id)->first();
        }
        else if($video_type=="LiveTV")
        {
            $recently_info = LiveTv::where('id',$video_id)->first();
        }
        else
        {
            $recently_info = Episodes::where('id',$video_id)->first();
        }
        

        return $recently_info;
    }
}

if (! function_exists('putPermanentEnv')) {

 function putPermanentEnv($key, $value)
{
    $path = app()->environmentFilePath();

    $escaped = preg_quote('='.env($key), '/');

    file_put_contents($path, preg_replace(
        "/^{$key}{$escaped}/m",
        "{$key}={$value}",
        file_get_contents($path)
    ));
}

}

if (! function_exists('getcong')) {

    function getcong($key)
    {
    	 
        $settings = Settings::findOrFail('1'); 

        return $settings->$key;
    }
}
 

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathSub')) {
    function classActivePathSub($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' subdrop';
    }
}

if (!function_exists('classActivePathSub_Style')) {
    function classActivePathSub_Style($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'display: block;';
    }
}

if (!function_exists('classActivePathSite')) {
    function classActivePathSite($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'active';
    }
}

if (!function_exists('generate_timezone_list')) {
function generate_timezone_list()
{
    static $regions = array(
        DateTimeZone::AFRICA,
        DateTimeZone::AMERICA,
        DateTimeZone::ANTARCTICA,
        DateTimeZone::ASIA,
        DateTimeZone::ATLANTIC,
        DateTimeZone::AUSTRALIA,
        DateTimeZone::EUROPE,
        DateTimeZone::INDIAN,
        DateTimeZone::PACIFIC,
    );

    $timezones = array();
    foreach( $regions as $region )
    {
        $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
    }

    $timezone_offsets = array();
    foreach( $timezones as $timezone )
    {
        $tz = new DateTimeZone($timezone);
        $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
    }

    // sort timezone by offset
    ksort($timezone_offsets);

    $timezone_list = array();
    foreach( $timezone_offsets as $timezone => $offset )
    {
        $offset_prefix = $offset < 0 ? '-' : '+';
        $offset_formatted = gmdate( 'H:i', abs($offset) );

        $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

        $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
    }

    return $timezone_list;
}

} 

if (!function_exists('plan_count_by_month')) {
    function plan_count_by_month($plan_id,$month_name)
    {       
            //echo $month_name;

             $start_month = date('Y-m-d', strtotime('first day of '.$month_name.''));
             $finish_month = date('Y-m-d', strtotime('last day of '.$month_name.''));
             
            $monthly_plan_purchase = Transactions::where('plan_id',$plan_id)->whereBetween('date', array(strtotime($start_month), strtotime($finish_month)))->count();

            return $monthly_plan_purchase;
    }
}

if (! function_exists('check_verify_purchase')) {

    function check_verify_purchase()
    { return true;
        $api = new LicenseBoxAPI();
        $verify_obj=$api->verify_license(false);

        //print_r($verify_obj);
        //exit;

 
        if($verify_obj["status"]==1)
        {
            return true;
        }
        else
        {    
            \Redirect::to('admin/verify_purchase')->send();             
            exit;
        }
         
    }
}

if (! function_exists('verify_envato_purchase_code')) {
function verify_envato_purchase_code($product_code)
    { 
      
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);


        $personal_token = "M8tF6z8lzZBBkmZt4xm3dU4lw7Rlbrwp";
        $header = array();
        $header[] = 'Authorization: Bearer '.$personal_token;
        $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
        $header[] = 'timeout: 20';
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

        $envatoRes = curl_exec($curl);
        curl_close($curl);
        $envatoRes = json_decode($envatoRes);
         

         return $envatoRes;
      
    }
} 

if (! function_exists('grab_image')) {
function grab_image($file_url,$save_to){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 140);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $output = curl_exec($ch);
        $file = fopen($save_to, "w+");
        fputs($file, $output);
        fclose($file);
    }
}

if (! function_exists('checkSignSalt')) {
function checkSignSalt($data_info){

        $key="viaviweb";

        $data_json = $data_info;

        $data_arr = json_decode(urldecode(base64_decode($data_json)),true);

        //echo $data_arr['salt'];
        //exit;

        if($data_arr['sign'] == '' && $data_arr['salt'] == '' ){
            //$data['data'] = array("status" => -1, "message" => "Invalid sign salt.");
        
            $set['VIDEO_STREAMING_APP'][] = array("status" => -1, "message" => "Invalid sign salt.");
            header( 'Content-Type: application/json; charset=utf-8' );
            echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            exit();


        }else{
            
            $data_arr['salt'];    
            
            $md5_salt=md5($key.$data_arr['salt']);

            if($data_arr['sign']!=$md5_salt){

                //$data['data'] = array("status" => -1, "message" => "Invalid sign salt.");
                $set['VIDEO_STREAMING_APP'][] = array("status" => -1, "message" => "Invalid sign salt.");   
                header( 'Content-Type: application/json; charset=utf-8' );
                echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                exit();
            }
        }
        
        return $data_arr;
        
    }
}    

if (! function_exists('check_app_user_plan')) {

    function check_app_user_plan($user_id)
    {

        // $user_id=$get_data['user_id'];

        $user_info = User::findOrFail($user_id);
        $user_plan_id=$user_info->plan_id;
        $user_plan_exp_date=$user_info->exp_date;
 

        if($user_plan_id==0)
        {          
             return false;
        }
        else if(strtotime(date('m/d/Y'))>$user_plan_exp_date)
        {

                return false;
        }
        else
        {
                return true;
        }
         
    }
}

if (! function_exists('get_ads')) {

    function get_ads($key)
    {
         
        $ad_obj = Ads::where('ad_key',$key)->first(); 

        return $ad_obj;
    }
}
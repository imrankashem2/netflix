<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Language;
use App\Genres;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str; 

class ImportImdbController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }

    public function find_imdb_movie()
    { 
        $string= $_GET['id'];

        preg_match_all("/tt\\d{7,8}/", $string, $ids);

        //print_r($ids);
        //echo $ids[0][0];

        if(isset($ids[0][0]))
        {   
            $search_by='i';
            $imbd_id_title=$ids[0][0];
        }
        else
        {   
            $search_by='t';
            $imbd_id_title=str_replace(' ', '+', $string);
        }
        //exit;

        $type= $_GET['from'];

        $omdb_api_key=getcong('omdb_api_key');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://www.omdbapi.com/?'.$search_by.'='.$imbd_id_title.'&apikey='.$omdb_api_key.'&plot=full&type='.$type.'');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);



        if(isset($obj->Response) && $obj->Response=="True")
        {   

            $response['imdb_status']    = 'success';             
            $response['imdbid']         = $obj->imdbID;
            $response['imdb_rating']         = $obj->imdbRating;
            $response['imdb_votes']         = $obj->imdbVotes;

            $response['title']          = $obj->Title;
            $response['runtime']        = $obj->Runtime;
            $response['released']       = date('m/d/Y',strtotime($obj->Released));

            //Get Lang
            $lang_list=explode(',', $obj->Language)[0];
            $response['language']          = Language::getLanguageID($lang_list);   
            
            //Get Genre
            $genre_names          = $obj->Genre;

            foreach(explode(", ",$genre_names) as $gname)
            { 
                $genre[]= Genres::getGenresID($gname);
            }

            //print_r($genre);
            //exit;

            $response['genre']=$genre;

            $director          = $obj->Director;
            $writer            = $obj->Writer;
            $actors            = $obj->Actors;
            
            if(isset($obj->Production))
            {
                $production        = $obj->Production?$obj->Production:'';
            }
            else
            {
                $production        ='';
            }
            

            $response['plot']  = $obj->Plot."<p><b>Director</b>: ".$director."</p>"."<p><b>Writer</b>: ".$writer."</p>"."<p><b>Actors</b>: ".$actors."</p>"."<p><b>Production</b>: ".$production."</p>";

            $image_path=$obj->Poster;
            $response['thumbnail']          = $image_path;

            $get_file_name = parse_url($image_path, PHP_URL_PATH);

            // extracted basename
            $response['thumbnail_name']  = basename($get_file_name);

        }
        else
        {
            $response['imdb_status']    = 'fail';
        }
        //echo $obj->Title;
         //echo $_GET['id'];

         echo json_encode($response);
         exit;
    }

    public function find_imdb_show()
    { 
        $string= $_GET['id'];

        preg_match_all("/tt\\d{7,8}/", $string, $ids);

        //print_r($ids);
        //echo $ids[0][0];

        if(isset($ids[0][0]))
        {   
            $search_by='i';
            $imbd_id_title=$ids[0][0];
        }
        else
        {   
            $search_by='t';
            $imbd_id_title=str_replace(' ', '+', $string);
        }
        //exit;

        $type= $_GET['from'];

        $omdb_api_key=getcong('omdb_api_key');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://www.omdbapi.com/?'.$search_by.'='.$imbd_id_title.'&apikey='.$omdb_api_key.'&plot=short&type='.$type.'');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);



        if(isset($obj->Response) && $obj->Response=="True")
        {   

            $response['imdb_status']    = 'success';             
            $response['imdbid']         = $obj->imdbID;
            $response['imdb_rating']         = $obj->imdbRating;
            $response['imdb_votes']         = $obj->imdbVotes;

            $response['title']          = $obj->Title;
             
            //Get Lang
            $lang_list=explode(',', $obj->Language)[0];
            $response['language']          = Language::getLanguageID($lang_list);   
            
            //Get Genre
            $genre_names          = $obj->Genre;

            foreach(explode(", ",$genre_names) as $gname)
            { 
                $genre[]= Genres::getGenresID($gname);
            }

            //print_r($genre);
            //exit;

            $response['genre']=$genre; 
             
            $response['plot']  = $obj->Plot;

        }
        else
        {
            $response['imdb_status']    = 'fail';
        }
        //echo $obj->Title;
         //echo $_GET['id'];

         echo json_encode($response);
         exit;
    }
    

    public function find_imdb_episode()
    { 
        $string= $_GET['id'];

        preg_match_all("/tt\\d{7,8}/", $string, $ids);

        //print_r($ids);
        //echo $ids[0][0];

        if(isset($ids[0][0]))
        {   
            $search_by='i';
            $imbd_id_title=$ids[0][0];
        }
        else
        {   
            $search_by='t';
            $imbd_id_title=str_replace(' ', '+', $string);
        }
        //exit;

        $type= $_GET['from'];

        $omdb_api_key=getcong('omdb_api_key');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://www.omdbapi.com/?'.$search_by.'='.$imbd_id_title.'&apikey='.$omdb_api_key.'&plot=full&type='.$type.'');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);

        //dd($obj);
        //exit;

        if(isset($obj->Response) && $obj->Response=="True")
        {   

            $response['imdb_status']    = 'success';             
            $response['imdbid']         = $obj->imdbID;
            $response['imdb_rating']         = $obj->imdbRating;
            $response['imdb_votes']         = $obj->imdbVotes;

            $response['title']          = $obj->Title;
             
              
            $director          = $obj->Director;
            $writer            = $obj->Writer;
            $actors            = $obj->Actors;
 
            $response['plot']  = $obj->Plot."<p><b>Director</b>: ".$director."</p>"."<p><b>Writer</b>: ".$writer."</p>"."<p><b>Actors</b>: ".$actors."</p>";


            $response['runtime']        = $obj->Runtime;
            $response['released']       = date('m/d/Y',strtotime($obj->Released));


        }
        else
        {
            $response['imdb_status']    = 'fail';
        }
        //echo $obj->Title;
         //echo $_GET['id'];

         echo json_encode($response);
         exit;
    }
     
}

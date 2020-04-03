<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    protected $table = 'episodes';

    protected $fillable = ['video_title','video_image'];


	public $timestamps = false;
 
	 
	
	public static function getEpisodesInfo($id,$field_name) 
    { 
		$episodes_info = Episodes::where('status','1')->where('id',$id)->first();
		
		if($episodes_info)
		{
			return  $episodes_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}

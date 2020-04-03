<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $table = 'home_section';

    protected $fillable = ['section1_title','section1_type'];


	public $timestamps = false; 	 
	 
}

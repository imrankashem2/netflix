<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads_management';

    protected $fillable = ['ad_title', 'status'];


	public $timestamps = false;  
	
}

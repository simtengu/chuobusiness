<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    
    protected $fillable = ["name","region_id","aka"];

    public function region(){
    	return $this->belongsTo('App\Region');
    }

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function product(){
    	return $this->hasMany('App\Product');
    }
}

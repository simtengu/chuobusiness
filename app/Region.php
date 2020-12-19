<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    

    protected $fillable = ["name"];

    public function university(){
    	return $this->hasMany('App\University');
    }
}

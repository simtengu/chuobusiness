<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['name','id'];

    public function product(){
    	return $this->hasMany('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    protected $fillable = ['name'];

    public function chuoproduct(){
    	return $this->hasMany('App\Chuoproduct');
    }
}

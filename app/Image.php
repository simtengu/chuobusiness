<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name','chuoproduct_id','id'];

    public function chuoproduct(){
       return $this->belongsTo('App\Chuoproduct');
    }
}

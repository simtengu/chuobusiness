<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
       
    protected $fillable = ['name','product_id','id'];

    public function product(){
       return $this->belongsTo('App\Product');
    }


}

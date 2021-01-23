<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium_request extends Model
{
    protected $fillable = ['id','product_id','user_phone'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}

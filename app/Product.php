<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','category_id','product_price','product_description','period_value','period_id','university_id','brand_id','id','user_id'];



        public function brand(){
            return $this->belongsTo('App\Brand');
        }

        public function university(){
        	return $this->belongsTo('App\University');
        }


        public function photo(){
    	  return $this->hasMany('App\Photo');
        }
        
        public function period(){
    	  return $this->belongsTo('App\Period');
        }

        public function category(){
          return $this->belongsTo('App\Category');
        }

        public function user(){
          return $this->belongsTo('App\User');
        }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chuoproduct extends Model
{
    protected $fillable = ['product_name','category_id','product_price','product_model','product_ram','os_id','product_camera','product_processor','product_display','product_release_date','product_description','brand_id','user_id','period_value','period_id','chuoproductType_id'];

   
   public function user(){
   	return $this->belongsTo('App\User');
   }
  public function image(){
    	  return $this->hasMany('App\Image');
  }
        public function period(){
    	  return $this->belongsTo('App\Period');
        }
         public function brand(){
            return $this->belongsTo('App\Brand');
        }

         public function chuoproductType(){
            return $this->belongsTo('App\ChuoproductType');
        }
         public function os(){
            return $this->belongsTo('App\Os');
        }

}

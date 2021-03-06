<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class PremiumItem extends Model
{
     protected $fillable = ['id','product_id'];


     public function product(){
         return $this->belongsTo(Product::class);
     }
}

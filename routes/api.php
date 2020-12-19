<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/names', function(){
//   $data = Http::get('http://localhost/usedproducts/public/api/displaynames');
//   $data = json_decode($data);
//    $body = "<ul>";
//    foreach ($data as $item) {
//    	  $body .= "<li><h4>".$item->product_name."</h4><p>".$item->product_price."</p></li>";
//    }
//    $body .= "</ul>";

//    return $body;
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

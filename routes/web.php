<?php

use Illuminate\Support\Facades\Route;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
})->name('home');
//university search .......................
Route::get('/uv_fetch/{id}','GeneralController@uv_fetch')->name('registration.uv_search');
//login and registration routes.......................................
Route::resource('/user','UsersController');
Route::get('/email_validation/{email}', function($email){
   $email_count = User::where('email',$email)->count();
   if ($email_count > 0) {
   	  return "yes";
   }else{
   	return "no";
   }

});
Route::post('/login','UsersController@login')->name('login');
Route::post('/logout',function(){
    	Auth::logout();
    	return redirect('/');
})->name('signout');
//end of authentication routes..................................
Route::view('/contact_us','contact_us')->name('contact_us');
//end of login and registration routes................................

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\User;
use App\Product;
use App\Chuoproduct;
use App\Category;

Route::get('/', function () {
  $chuoproducts = Chuoproduct::latest()->get();
  $productsClass = new ProductsController();
  $universities = $productsClass->topUniversities();
  $regions = $productsClass->regions();
  $categories = Category::all();
	$products = Product::simplePaginate(28);
    return view('landingpage',compact('products','chuoproducts','categories','universities','regions'));
})->name('home');
Route::resource('/user','UsersController');
Route::resource('/product','ProductsController');
//university search .......................
Route::get('/uv_fetch/{id}','GeneralController@uv_fetch')->name('registration.uv_search');
//login and registration routes.......................................
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
Route::post('/image_save','ProductsController@image_save')->name('image_save');
Route::post('/picture_save','ProductsController@picture_save')->name('picture_save');
Route::get('/product/delete_image/{id}','ProductsController@delete_image')->name('delete_image');
Route::get('/product/delete_picture/{id}','ProductsController@delete_picture')->name('delete_picture');

Route::get('/product/ajax_image_delete/{id}','ProductsController@delete_image_ajax')->name('ajax.image_delete');
Route::get('/product/ajax_picture_delete/{id}','ProductsController@delete_picture_ajax')->name('ajax.picture_delete');
//adding item image in edit page
Route::patch('/item/add_image','ProductsController@product_save')->name('product_add');
//adding item image id chuoproduct edit page...
Route::patch('/item/add_picture','ProductsController@product_picture_save')->name('product_picture_save');
Route::get('/user_cat/products/{cat}','ProductsController@user_cat_products')->name('user_cat.products');
Route::get('/premium_product','ProductsController@premium_product')->name('product.premium');
Route::get('/premium_confirm/{id}','ProductsController@premium_confirm')->name('premium_confirm');
Route::post('/premium','ProductsController@premium_check')->name('premium_check');
Route::delete('/premium_delete/{id}','ProductsController@delete_premium_request')->name('premium.request.delete');
Route::patch('/user/password_reset/{user_id}','UsersController@password_reset')->name('password_reset');
//user shop route...................................................................
Route::get('/user/shop/{id}','UsersController@user_shop')->name('user.shop');
//products details and more information route.........................................
Route::get('/item/{type}/{id}', 'ProductsController@item_preview')->name('item_preview');
//products filtering route..........................................
Route::get('/products/orderby/{order_type}','ProductsController@order_type')->name('products.order_type');
//category products filtering route.................................
Route::get('/category_products/{category}/{order_type}','ProductsController@category_order_type')->name('category_products.order_type');
//specific region products......................................
Route::get('/region_products/{region_id}/{order_type}','ProductsController@region_products')->name('region_products');
Route::get('/regionProducts','ProductsController@regionProducts')->name('region.products');
Route::get('/region_categories/{region_id}/{category_id}/{order_type}','ProductsController@region_categories')->name('region_categories');
Route::get('/regionCategories','ProductsController@regionCategories')->name('region.categories');
//university products routes.........................
 Route::get('/university_products/{university_id}/{order_type}','ProductsController@university_products')->name('university_products');
Route::get('/universityProducts','ProductsController@universityProducts')->name('university.products');
Route::get('/university_categories/{university_id}/{category_id}/{order_type}','ProductsController@university_category_products')->name('university_categories');
// Auth::routes();
Route::get('/universityCategories','ProductsController@universityCategoryProducts')->name('university.categories');
Route::resource('/chuoproduct','ChuoproductsController');
//item search through a form...... .....................................................................
Route::get('/item_search','ProductsController@productSearch')->name('itemSearch');
// item search via ajax(nationwise&college/university name)..............................................
Route::get('/item-search/{level}/{search_key}','ProductsController@product_search')->name('item_search');
//item search at region and university level(ajax)............................... 
Route::get('/itemSearch/{level}/{id}/{search_key}','ProductsController@search_product')->name('search_item');
Route::get('/regionItemSearch/{order}/{region_id}/{product_id}','ProductsController@region_search_results')->name('region.searched_item');

Route::get('/universityItemSearch/{order}/{university_id}/{product_id}','ProductsController@university_search_results')->name('university.searched_item');

Route::get('/nationwiseItemSearch/{order}/{product_id}','ProductsController@nation_search_results')->name('nationwise.searched_item');
 // position: absolute;bottom: 0px;left:50px;
// Route::get('/home', 'HomeController@index')->name('home');


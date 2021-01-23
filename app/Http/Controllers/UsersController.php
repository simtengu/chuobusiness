<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Signup;
use App\Region;
use App\Product;
use App\User;
use App\Role;
use App\University;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function userCategories(){
         $user_id = Auth::user()->id;
          return Product::selectRaw('count(category_id) as total,category_id ')->where('user_id','=',$user_id)->groupBy('category_id')->orderBy('total','desc')->limit(6)->get();
    }

    public function index()
    {
      
         $user_id = Auth::user()->id;
         $products = Product::where('user_id','=',$user_id)->simplePaginate(6);
         $categories = $this->userCategories();
         $cat_count = $categories->count();
         if(session()->has('product_deleted')){
           session()->flash("product_deleted","Product successful deleted");
         }elseif (session()->has('product_added')) {
             session()->flash("product_added","One product has been successfully added");
         }
         return view('user_profile.index',compact('products','categories','cat_count'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
          $productsClass = new ProductsController();
          $universities = $productsClass->topUniversities();
          $regions = $productsClass->regions();
          $regions = Region::orderBy('name','asc')->get();
        return view('register',compact('regions','universities','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Signup $data)
    {


        $jj = new User();
        $jj['fname'] = $data->get('fname');
        $jj['lname'] = $data->get('lname');
        $jj['email'] = $data->get('email');
        $jj['whatsapp_phone'] = $data->get('whatsapp_phone');
        $jj['university_id'] = $data->get('university_id');
        $jj['phone_2'] = $data->get('phone_2');
        $jj['password'] = Hash::make($data->get('password'));
        $jj->save();
        Auth::login($jj,true);
           Session()->flash('registration_session',Auth::user()->fname.' your account was successfully created....You are welcome');
        return redirect('/');
      
      


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
         $categories = $this->userCategories();
         $cat_count = $categories->count();
        $regions = Region::orderBy('name','asc')->get();
        return view("user_profile.edit",compact('user','cat_count','categories','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formUv_id = $request->input('university_id');
        $user = User::findOrFail($id);
      if ($formUv_id == null) {
          $uv_id = $user->university_id;
      }else{
          $uv_id = $formUv_id;
      }

       $user->fname = $request->fname;
       $user->lname = $request->lname;
       $user->email = $request->email;
       $user->whatsapp_phone = $request->whatsapp_phone;
       $user->phone_2 = $request->phone_2;
       $user->university_id = $uv_id;

        $user->update();
         session()->flash("user_updated","your data has been successfully updated");
        return redirect()->route('user.edit',$id);
    }

    public function password_reset(Request $data, $id){
         $hashed = Auth::user()->password;
        if (Hash::check($data->current_pwd,$hashed)) {
           $user = User::findOrFail($id);
           $user->password = Hash::make( $data->password);
           $user->update();
            session()->flash("user_updated","your data has been successfully updated");
            return redirect()->route('user.edit',$id);
        }else{
            session()->flash("password_reset_fail","You have typed wrong current password");
            return redirect()->route('user.edit',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //login method...................................
 public function login(Request $request){
    $credentials = $request->except('login_url');
    if ($request->has('remember_me')) {
        $remember = true;
    }else{
        $remember = false;
    }
    $email = $credentials['email'];
    $pwd = $credentials['password'];
    
    if (Auth::attempt(['email'=>$email,'password' =>$pwd],$remember)) {
        return "ok";
    }else{ 
        return "wrong email or password";
    }
 }


 public function user_shop($id){
    $user = User::findOrFail($id);
    $products = Product::where('user_id','=',$id)->paginate(20);
    return view('user_profile.user_shop_view',compact('products','user'));
 }
 
}

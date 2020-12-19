<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Signup;
use App\Region;
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $regions = Region::orderBy('name','asc')->get();
        return view('register',compact('regions'));
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
        //
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
        //
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
 
}

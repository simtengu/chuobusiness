<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Region;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GeneralController extends Controller
{

	function user_password_update(Request $data,$email){
		 $user_count = User::where('email',$email)->count();
		 if($user_count == 1){
			 $user = User::where('email',$email)->first();
			 $code = $data->code;
			 $new_password = $data->new_password;
			 if($code == $user->reset_code){
              $user->password = Hash::make($new_password);
			  $user->reset_code = null;
			  $user->save();
			  Auth::login($user,true);
			    Session()->flash('password_updated', "Your password has been updated successfully");
			  return redirect()->route('home');
			 }else{
			Session()->flash('wrong_code', "you have typed wrong reset code");
				 return redirect()->back();
			 }

		 }else{
			 return redirect()->back();
		 }
  
   }

    public function uv_fetch($id){
	   $universities = DB::table('universities')->where('region_id','=',$id)->orderBy('name','asc')->get();   
	   $count = $universities->count();
	   if ($count > 0) {
		     $result = "<select id='reg_university' name='university_id'><option value='' selected>Select University</option>";
		     foreach ($universities as $university) {
		     	$result .= "<option value='".$university->id."'>".$university->name."</option>";
		     }

		     $result .= "</select>";

		     return $result;    

	   }else{
         return "<div id='reg_university'  ><h5 style='color:red;'>Region selected has no registered universities yet.</h5><br>"."<a style='color:blue;' href='". route('contact_us')."' >Click here to add your university/college</a></div>";

	   }             
	  
    }
}

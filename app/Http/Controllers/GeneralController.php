<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Region;
use App\User;
use App\Role;
use App\University;
class GeneralController extends Controller
{
    

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

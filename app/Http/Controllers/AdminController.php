<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Region;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CollegeRequest;

class AdminController extends Controller
{
    public function __construct(){

    }


    public function index($range){
    	$users = User::paginate($range);
    	return view('admin.index',compact('users'));
    }

    public function messageStore(Message $data){

        $rows =   DB::insert('insert into messages (name,email,phone,body) values(?,?,?,?)', [$data->name,$data->email,$data->phone,$data->body]);
        if($rows == 1){
            session()->flash("message_submitted","We have received your message..Thank you");
          return redirect()->back();
        }
    }

    public function getMessages(){
       $messages =  DB::select('select * from messages');
       $college_requests =  DB::select('select * from college_requests');
       return view('admin.messages',compact('messages','college_requests'));
    }

    public function collegeRequestStore(CollegeRequest $data){
       $rows =   DB::insert('insert into college_requests (name,email,college_name,region) values(?,?,?,?)', [$data->name,$data->email,$data->college,$data->region]);
       if($rows == 1){
           session()->flash("college_submitted","We have received your message..Thank you");
         return redirect()->back();
       }
        
    }


    public function deleteCollegeRequest($request_id){
       DB::delete('delete from college_requests where id = ?', [$request_id]);
       return redirect()->back();
    }

    public function deleteMessage($message_id){
      DB::delete('delete from messages where id = ?', [$message_id]);
      return redirect()->back();

    }

    public function user_details($email){
      $user = User::whereEmail($email)->first();
      $products = Product::where('user_id',$user->id)->get();
      $roles = Role::pluck("name","id")->all();
      return view('admin.user_details',compact('user','products','roles'));
      
    }

    public function password_reset($id){

           $user = User::findOrFail($id);
           $new_password = rand(10000,100000);
           $user->password = Hash::make( $new_password);
           if(Auth::user()->isSuperAdmin()){
            $user->update();
            session()->flash("user_updated","New password is: " .$new_password);
            return redirect()->back();
          }else{
            return "not allowed";
          }

    }


   public function changeUserRole(Request $data){
      $role = $data->role_id;
      $user = User::findOrFail($data->user_id);
      if(Auth::user()->isSuperAdmin()){
       $user->role_id = $role;
       $user->update();
       session()->flash('role_changed', 'user role has been changed successfully');
       return redirect()->back();
      }else{
        return "not allowed";
      }
   }

   public function reportPost($id){
      $rows_count = DB::table('reported_posts')->where('product_id',$id)->get()->count();
      if($rows_count == 0){
        DB::insert('insert into reported_posts (product_id) values (?)', [$id]);
      }
     session()->flash('product_reported', 'A product has been reported successfully...Thank you for reporting');
     return redirect()->back();
   }

   public function reportedPosts(){
    $reported_posts = DB::table('reported_posts')->select('product_id')->get();
    $id_collection = [];
    foreach ($reported_posts as $post) {
       array_push($id_collection,$post->product_id);
    } 
   $products =  Product::whereIn('id', $id_collection)->get();
   return view('admin.products.reported_posts', compact('products'));
   }

   public function deleteReportedPost($id){
       DB::delete('delete from reported_posts where product_id = ?', [$id]);
       return redirect()->back();
   }


}

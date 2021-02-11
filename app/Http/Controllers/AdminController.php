<?php

namespace App\Http\Controllers;

use App\Log;
use App\Role;
use App\User;
use App\Brand;
use App\Photo;
use App\Region;
use App\Product;
use App\Category;
use App\University;
use App\PremiumItem;
use App\Premium_request;
use Illuminate\Http\Request;
use App\Http\Requests\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CollegeRequest;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware(['auth','super_admin','preventBackHistory'],['except'=>'reportPost']);
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
     session()->flash('product_reported', 'Product reported...Thank you for reporting');
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

   public function checkReportedProduct($product_id){
      $product = Product::findOrFail($product_id);
       return view('admin.products.reported_post_delete', compact('product'));
   }

   public function deletePremiumLog($id){
       Log::findOrFail($id)->delete();
       return redirect()->back();
   }
   
   public function premium_requests(){

     $premium_logs = Log::all();
     $premium_requests = Premium_request::all();
     return view('admin.premium_requests',compact('premium_logs','premium_requests'));
   }

   public function verifyPremiumRequest($id){
      $product  = Product::findOrFail($id);
      $product->premium = 1;
      $product->save();
      Premium_request::where('product_id',$id)->delete();
      PremiumItem::create(['product_id'=>$id]);
      Session()->flash('premium_request_verified', "one product has been upgraded to premium");
     return redirect()->back();
   }

   public function getPremiumProducts(){
     $premium_products = PremiumItem::all();
     return view('admin.view_premium_products',compact('premium_products'));
   }

   public function getCategories(){
     $brands = Brand::all();
     $categories = Category::all();
     return view('admin.categories',compact('brands','categories'));
   }

   public function addCategory(Request $data){
     Category::create(['name'=> $data->category]);
     session()->flash('category_added','One category has been added');
     return redirect()->back();
   }

   public function addBrand(Request $data){
     Brand::create(['name'=> $data->brand]);
     session()->flash('brand_added','One brand has been added');
     return redirect()->back();
   }
   public function editBrand($brand_id){

       $brand = Brand::findOrFail($brand_id);
       return view('admin.editcategory',compact('brand'));
   }

   public function editCategory($category_id){
       $category = Category::findOrFail($category_id);
       return view('admin.editcategory',compact('category'));
   }

  public function updateBrand(Request $request, $id){
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();
        session()->flash('brand_updated','A brand has been updated');
        return redirect()->route('admin.categories');
  }

  public function updateCategory(Request $request, $id){
      $category = Category::findOrFail($id);
      $category->slug = null;
      $category->name = $request->name;
      $category->save();
      session()->flash('category_updated','A category has been updated');
      return redirect()->route('admin.categories');
  }

  public function deleteBrand($brand_id){
    Brand::findOrFail($brand_id)->delete();
    session()->flash('brand_deleted','One Brand has been deleted');
    return redirect()->route('admin.categories');
  }

  public function deleteCategory($category_id){
    Category::findOrFail($category_id)->delete();
    session()->flash('category_deleted','One category has been deleted');
    return redirect()->route('admin.categories');  
  }

  public function viewUniversities(){
   $regions = Region::orderBy('name','asc')->get();

    $universities = University::select('universities.*')
    ->join('regions', 'regions.id', '=', 'universities.region_id')
    ->orderBy('regions.name')
    ->get();    
      
      return view('admin.viewUniversities',compact('regions','universities'));

  }

  public function addUniversity(Request $data){
      $uv = new University();
      $uv->create($data->all());
    session()->flash('university_added','One university has been added');
    return redirect()->back();
  }

  public function editUniversity($university_id){
    $university = University::findOrFail($university_id);
    $regions = Region::orderBy('name')->pluck('name','id')->all();
    return view('admin.editUniversity',compact('university','regions'));
  }

  public function updateUniversity(Request $request, $id){
      $university = University::findOrFail($id);
      $university->update($request->all());
      session()->flash('university_updated','A university has been updated');
      return redirect()->back();
  }

  public function deleteUniversity($uv_id){
    University::findOrFail($uv_id)->delete();
    session()->flash('university_deleted','One university has been deleted');
    return redirect()->route('admin.viewUniversities');
  }

  public function deleteReportedProduct($product_id){
       $product =  Product::findOrFail($product_id);
        $product->delete();
              $images =  Photo::where('product_id',$product_id)->get();
               foreach($images as $image){
                $pic_name = $image->name;
                 if (File::exists(public_path('/images').'/'.$pic_name)) {
                   File::delete(public_path('/images').'/'.$pic_name);
                 }
                 $image->delete();
               } 

            DB::delete('delete from reported_posts where product_id = ?', [$product_id]);
            return redirect()->route('admin.reportedPosts');

  }


}

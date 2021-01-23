<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Requests\ProductImage;
use App\Http\Requests\Item_image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Category;
use App\University;
use App\Premium_request;
use App\Product;
use App\Chuoproduct;
use App\ChuoproductType;
use App\Region;
use App\Period;
use App\Brand;
use App\Photo;
use App\Image;
use App\Log;
use App\Os;

class ChuoproductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cat = new UsersController();
       $categories = $cat->userCategories();
       $cat_count = $categories->count();
       $user =  Auth::user();
       $user_id =$user->id;
       if ($user->isAdmin()) {
         $products = Chuoproduct::where('user_id',$user_id)->simplePaginate(6);
         if(session()->has('product_deleted')){
           session()->flash("product_deleted","Product successful deleted");
         }elseif (session()->has('product_added')) {
             session()->flash("product_added","One product has been successfully added");
         }
         return view('products.chuoproductsIndex',compact('products','categories','cat_count'));
       }else{
        return "You are not allowed";
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ChuoproductType::all();
        $cat = new UsersController();
        $operation_systems = Os::all();
        $categories = $cat->userCategories();
        $cat_count = $categories->count();
        $cats = Category::orderBy('name','asc')->get();
        $brands = Brand::orderBy('name','asc')->get();
        $form_id = rand(100,10000).substr(time(),5);
        return view('products.add_chuo_item',compact('brands','cats','form_id','categories','cat_count','types','operation_systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = Auth::user();
       $form_id = $request->input('form_id');
       $item = new Chuoproduct();
       $item->product_name = $request->product_name;
       $item->product_price = $request->product_price;
       $item->product_description = $request->product_description;
       $item->os_id = $request->os_id;
       $item->product_ram = $request->product_ram;
       $item->product_processor = $request->product_processor;
       $item->product_display = $request->product_display;
       $item->product_model = $request->product_model;
       $item->chuoproductType_id = $request->chuoproductType_id;
       $item->period_id = $request->period_id;
       $item->brand_id = $request->brand_id;
       $item->product_release_date = $request->product_release_date;
       $item->period_value = $request->period_value;
       $item->user_id = $user->id;
       if($user->isAdmin()) {
        $item->save();
        $photos = Image::where('chuoproduct_id',$form_id)->get();
        foreach ($photos as $photo) {
            $photo->update(['chuoproduct_id'=>$item->id,'name'=>$photo->name]);
        }
       session()->flash("product_added","One product has been successfully added");
       return redirect()->route('chuoproduct.index');
       }else{
        return "<h3 style='color:red;font-weight:bold;'>you are not allowed</h3>";
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = Chuoproduct::findOrFail($id);
       $cat = new UsersController();
       $categories = $cat->userCategories();
       $cat_count = $categories->count();
       if (session()->has('updated')) {
           session()->flash("updated","Product successful updated");
       }
       return view('products.chuoproduct_show',compact('product','categories','cat_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Chuoproduct::findOrFail($id);
       $cats = ChuoproductType::pluck('name','id')->all();
       $brands = Brand::pluck('name','id')->all();
       $os = Os::pluck('name','id')->all();
       $periods = Period::pluck('name','id')->all();
       $cat = new UsersController();
       $categories = $cat->userCategories();
       $cat_count = $categories->count();
       return view('products.chuoproduct_edit',compact('product','brands','cats','periods','categories','cat_count','os'));

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
        $product = Chuoproduct::findOrFail($id);
        $data = $request->except('form_id');
        if (Auth::user()->isAdmin()) {
          $product->update($data);
          session()->flash("updated","Product successful updated");
          return redirect()->route('chuoproduct.show',$id);        

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
        if (Auth::user()->isAdmin()) {
            Chuoproduct::findOrFail($id)->delete();
            session()->flash("product_deleted","Product successful deleted");
            return redirect()->route('chuoproduct.index');
        }else{
            return "you are not allowed";
        }
    }
}

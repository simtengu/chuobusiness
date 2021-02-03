<?php

namespace App\Http\Controllers;

use App\Os;
use App\User;
use App\Brand;
use App\Image;
use App\Period;
use App\Chuoproduct;
use App\ChuoproductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       if(session()->has('product_deleted')){
           session()->flash("product_deleted","Product successful deleted");
         }elseif (session()->has('product_added')) {
             session()->flash("product_added","One product has been successfully added");
         }
          $products = Chuoproduct::orderBy('chuoproductType_id','desc')->paginate(12);
          return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ChuoproductType::all();
        $users = User::where('role_id',1)->get();
        $operation_systems = Os::all();
        $brands = Brand::orderBy('name','asc')->get();
        $form_id = rand(100,10000).substr(time(),5);
        return view('admin.products.create',compact('brands','form_id','types','operation_systems','users'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $item->user_id = $request->user_id;
  
         $item->save();
         $photos = Image::where('chuoproduct_id',$form_id)->get();
         foreach ($photos as $photo) {
             $photo->update(['chuoproduct_id'=>$item->id,'name'=>$photo->name]);
         }
        session()->flash("product_added","One product has been successfully added");
        return redirect()->route('adminProduct.index');
 
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
        return view('admin.products.show', compact('product'));
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
        $users = User::where('role_id',1)->pluck('fname','id')->all();
        $os = Os::pluck('name','id')->all();
        $periods = Period::pluck('name','id')->all();
        return view('admin.products.edit',compact('product','brands','cats','periods','os','users'));

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
          return redirect()->route('adminProduct.show',$id);        

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
         Chuoproduct::findOrFail($id)->delete();
            session()->flash("product_deleted","Product successful deleted");
            return redirect()->route('adminProduct.index');
    }
}

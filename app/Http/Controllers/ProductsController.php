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
use App\Chuoproduct;
use App\Product;
use App\Region;
use App\Period;
use App\Brand;
use App\Photo;
use App\Image;
use App\Log;


class ProductsController extends Controller
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
        $cat = new UsersController();
        $categories = $cat->userCategories();
        $cat_count = $categories->count();
        $cats = Category::orderBy('name','asc')->get();
        $brands = Brand::orderBy('name','asc')->get();
        $form_id = rand(100,10000).substr(time(),5);
        return view('products.add',compact('brands','cats','form_id','categories','cat_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $user = Auth::user();
        $university_id = $user->university->id;
        $product = new Product();
        $product->product_name = $data->get('product_name');
        $product->user_id = $user->id;
        $product->university_id = $university_id;
        $product->product_price = $data->get('product_price');
        $product->product_description = $data->get('product_description');
        $product->category_id = $data->get('category_id');
        $product->brand_id = $data->get('brand_id');
        $product->period_value = $data->get('period_value');
        $product->period_id = $data->get('period_id');
       $product->save();
        $photos = Photo::where('product_id','=',$data->get('form_id'))->get();
        foreach ($photos as $photo) {
            $photo->update(['product_id'=>$product->id,'name'=>$photo->name]);
        }
         session()->flash("product_added","One product has been successfully added");
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = Product::findOrFail($id);
       $cat = new UsersController();
       $categories = $cat->userCategories();
       $cat_count = $categories->count();
       return view('products.show',compact('product','categories','cat_count'));
    }

   public function item_preview($type,$id){
        $universities = $this->topUniversities();
        $regions = $this->regions();
   if ($type == 1) {
         $product = Product::findOrFail($id);
         $product_region = $product->university->region_id;
         $more_related_items = Product::where('id','!=',$id)->where('category_id',$product->category_id)->where('university_id',$product->university_id)->orderBy('brand_id','asc')->get();

         $less_related_items = Product::where('university_id','!=',$product->university_id)
                                 ->where('category_id',$product->category_id)
                                 ->whereHas('university', function($q) use ($product_region) {
                                 $q->where('region_id',$product_region);
                                 })
                                 ->orderBy('brand_id','asc')->get();
         $less_related_items1 = Product::where('category_id',$product->category_id)
                                 ->whereHas('university', function($q) use ($product_region) {
                                 $q->where('region_id','!=',$product_region);
                                 })
                                 ->orderBy('brand_id','asc')->get();
         $less_related_count = $less_related_items->count();
         $less_related_count1 = $less_related_items1->count();
         $more_related_count = $more_related_items->count();
     return view('products.item_show',compact('product','less_related_items','less_related_items1','more_related_items','less_related_count','less_related_count1','more_related_count','universities','regions','type'));  

   }elseif ($type==2) {
   
         $product = Chuoproduct::findOrFail($id);
         $chuoproducts = Chuoproduct::where('id','!=',$id)->where('chuoproductType_id',$product->chuoproductType_id)->get();
         $products = Product::where('category_id',$product->chuoproductType_id)->paginate(32);
     return view('products.item_show',compact('product','type','universities','regions','chuoproducts','products'));
 
   }else{
    return "<h2>PAGE NOT FOUND</h2>";
   }
    
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       $product = Product::findOrFail($id);
       $cats = Category::pluck('name','id')->all();
       $brands = Brand::pluck('name','id')->all();
       $periods = Period::pluck('name','id')->all();
       $cat = new UsersController();
       $categories = $cat->userCategories();
       $cat_count = $categories->count();
       return view('products.edit',compact('product','brands','cats','periods','categories','cat_count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
 
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $product->product_name = $data->get('product_name');
        $product->product_price = $data->get('product_price');
        $product->product_description = $data->get('product_description');
        $product->category_id = $data->get('category_id');
        $product->brand_id = $data->get('brand_id');
        $product->period_value = $data->get('period_value');
        $product->period_id = $data->get('period_id');
        $product->update();
        session()->flash("updated","Product successful updated");
        return redirect()->route('product.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash("product_deleted","Product successful deleted");
        return redirect()->route('user.index');

    }

   //new product images upload,, for customers ..........................................

    public function image_save(ProductImage $data){

            if ($file = $data->file('product_image')) {
                $pic_name = time().$file->getClientOriginalName();
                $file->move('images',$pic_name);
                $photo = new Photo();
                $photo->name = $pic_name;
                $photo->product_id = $data->form_id;
                $photo->save();
                return response()->json(['img' => '<div id="img" class="col-6 col-sm-3"><img  src="'.asset('/images').'/'.$pic_name.'" class="img-thumbnail"><a id="delete" href="'.route('delete_image',$photo->id).'" class="text-danger p-2">Delete</a><input type="hidden" value="'.$photo->id.'"></div>',
                    'img_id' => $photo->id ]);
           
        }

 }

    //new product images upload,, for chuobusiness .....................................

    public function picture_save(ProductImage $data){

            if ($file = $data->file('product_image')) {
                $pic_name = time().$file->getClientOriginalName();
                $file->move('pictures',$pic_name);
                $photo = new Image();
                $photo->name = $pic_name;
                $photo->chuoproduct_id = $data->form_id;
                $photo->save();
                return response()->json(['img' => '<div id="img" class="col-6 col-sm-3"><img  src="'.asset('/pictures').'/'.$pic_name.'" class="img-thumbnail"><a id="delete" href="'.route('delete_picture',$photo->id).'" class="text-danger p-2">Delete</a><input type="hidden" value="'.$photo->id.'"></div>',
                    'img_id' => $photo->id ]);
        }

 }


   //new product images upload via edit form..........................................

    public function product_save(Item_image $data){
     
            if ($file = $data->file('product_image')) {
                $pic_name = time().$file->getClientOriginalName();
                $file->move('images',$pic_name);
                $photo = new Photo();
                $photo->name = $pic_name;
                $photo->product_id = $data->form_id;
                $photo->save();
                return response()->json(['img' => '<div id="img" class="col-6 col-sm-3"><img  src="'.asset('/images').'/'.$pic_name.'" class="img-thumbnail"><a id="delete" href="'.route('delete_image',$photo->id).'" class="text-danger p-2">Delete</a><input type="hidden" value="'.$photo->id.'"></div>',
                    'img_id' => $photo->id ]);
           
        }

 }

 //new chuoproduct image via edit form.................................
     public function product_picture_save(Item_image $data){
     
            if ($file = $data->file('product_image')) {
                $pic_name = time().$file->getClientOriginalName();
                $file->move('pictures',$pic_name);
                $photo = new Image();
                $photo->name = $pic_name;
                $photo->chuoproduct_id = $data->form_id;
                $photo->save();
                return response()->json(['img' => '<div id="img" class="col-6 col-sm-3"><img  src="'.asset('/pictures').'/'.$pic_name.'" class="img-thumbnail"><a id="delete" href="'.route('delete_picture',$photo->id).'" class="text-danger p-2">Delete</a><input type="hidden" value="'.$photo->id.'"></div>',
                    'img_id' => $photo->id ]);
           
        }

 }


              //product image delete...........................................
             public function delete_image($id){

              $photo =  Photo::findOrFail($id);
              $pic_name = $photo->name;
               if (File::exists(public_path('/images').'/'.$pic_name)) {
                   File::delete(public_path('/images').'/'.$pic_name);
               }
              $photo->delete();
               return redirect()->back();
             }

              //product image delete  for chuoproduct...........................................
             public function delete_picture($id){

              $photo =  Image::findOrFail($id);
              $pic_name = $photo->name;
               if (File::exists(public_path('/pictures').'/'.$pic_name)) {
                   File::delete(public_path('/pictures').'/'.$pic_name);
               }
              $photo->delete();
               return redirect()->back();
             }


            //product image delete by ajax...........................................
             public function delete_image_ajax($id){
              $photo =  Photo::findOrFail($id);
              $product_id = $photo->product_id;
              $pic_name = $photo->name;
              if (File::exists(public_path('/images').'/'.$pic_name)) {
                   File::delete(public_path('/images').'/'.$pic_name);
               }
              $photo->delete();
              $img_count = Photo::where("product_id","=",$product_id)->count();
                return $img_count;

             }

            //product image delete by ajax...........................................
             public function delete_picture_ajax($id){
              $photo =  Image::findOrFail($id);
              $product_id = $photo->chuoproduct_id;
              $pic_name = $photo->name;
              if (File::exists(public_path('/pictures').'/'.$pic_name)) {
                   File::delete(public_path('/pictures').'/'.$pic_name);
               }
              $photo->delete();
              $img_count = Image::where("chuoproduct_id",$product_id)->count();
                return $img_count;

             }

         // user category products.............................

          public function user_cat_products($cat_id){
              $user_id = Auth::user()->id;
              $products  = Product::where('user_id','=',$user_id)->where('category_id','=',$cat_id)->simplePaginate(10);
              $cat = new UsersController();
              $categories = $cat->userCategories();
               $cat_count = $categories->count();
               $universities = $this->topUniversities();
               $regions = $this->regions();
              return view('products.user_cat_products',compact('products','categories','cat_count','universities','regions'));
          }


          public function premium_product(){
           $user_id = Auth::user()->id;
           $products = Product::where('user_id','=',$user_id)->simplePaginate(6);
           $cat = new UsersController();
           $categories = $cat->userCategories();
           $cat_count = $categories->count();
           return view('products.premium_product',compact('categories','cat_count','products'));
          }
//checking the status/level of a product
          Public function premium_confirm($id){
            $product = Product::findOrFail($id);
            $premium_products_count = Product::where('premium','=',1)->count();
            $premium_request_count = Premium_request::all()->count();
            $p_request = Premium_request::where('product_id','=',$id)->get();
            $item_count = $p_request->count();
            if ($product->premium == 1) {
              //the product is already premium
              $status = 1;
            } elseif($item_count > 0) {
              //the product is in premium requests list.
               $status = 2;
            }elseif (($premium_products_count + $premium_request_count) < 30) {
              //there is room for upgrading the product to premium
             $status = 3;  
            }else{
               Log::create(['user_id'=> Auth::user()->id,'message'=>'premium request']);
              $status = 4;
            }

           $cat = new UsersController();
           $categories = $cat->userCategories();
           $cat_count = $categories->count();
           if (Auth::user()->phone_2) {
             $phone = Auth::user()->phone_2." or ".Auth::user()->whatsapp_phone;
           }else{
            $phone = Auth::user()->whatsapp_phone;
           }

           return view('products.premium_confirm',compact('product','categories','cat_count','phone','status','p_request'));
          }

          public function delete_premium_request($id){
           $item = Premium_request::findOrFail($id);
           $product_id = $item->product_id;
           if (Auth::user()->id == $item->product->user_id) {
                $item->delete();
                Session()->flash('premium_req_canceled','You have successfully removed your request');
           }
           return redirect()->route('premium_confirm',$product_id);
          }
//premium request handling method....................................
          public function premium_check(Request $data){
            $premium_products_count = Product::where('premium','=',1)->count();
            $premium_request_count = Premium_request::all()->count();
            $item_count = Premium_request::where('product_id','=',$data->product_id)->count();
            if ($item_count > 0) {
               return response()->json([
                "status"=> 1, "message"=>"Previous request for this item is still pending......"
               ]);
            }elseif (($premium_products_count + $premium_request_count) < 30) {
                Premium_request::create(['product_id'=>$data->product_id,'user_phone'=>$data->user_phone]);
                return response()->json([
                 "status"=> 2, "message"=>"request received successfully"
                ]);
                
            }else{
                return response()->json([
                 "status"=> 3, "message"=>"sorry premium section space has just been fully taken"
                ]);

            }
          }

//ordering  products   nationalwise....................................................................
      public function order_type($order_type){
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $categories = Category::all();
        switch ($order_type) {
          case 1:
             $products = Product::orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
             $products = Product::orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
             $products = Product::orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
             $products = Product::where('period_id','!=',null)->orWhere('period_value','!=',null)->simplePaginate(28);
            break;
          case 5:
             $products = Product::where('period_id','=',null)->orWhere('period_value','=',null)->simplePaginate(28);
            break;

          default:
            break;
        }

         return view('products.products',compact('order_type','products','categories','universities','regions'));
      }

//ordering category products   nationalwise....................................................................
      public function category_order_type($category,$order_type){
         $categories = Category::all();
         $universities = $this->topUniversities();
         $regions = $this->regions();
         $category_id = $category;
        switch ($order_type) {
          case 1:
          //latest products.......
             $products = Product::where('category_id',$category_id)->orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
           //cheap first........
             $products = Product::where('category_id',$category_id)->orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
           //expensive first..............
             $products = Product::where('category_id',$category_id)->orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
          //used only...................
             $products = Product::where('category_id',$category_id)->where(function($q){
               $q->where('period_id','!=',null)->orWhere('period_value','!=',null);
             })->simplePaginate(28);
            break;
          case 5:
          //brand new first..................................
             $products = Product::where('category_id',$category_id)->where(function($q){
               $q->where('period_id',null)->orWhere('period_value',null);
             })->simplePaginate(28);
            break;

          default:
            break;
        }

         return view('products.category_products',compact('order_type','products','category_id','categories','universities','regions'));
      }

//region products................................................................................
      public function regionProducts(Request $data){
        $order_type = 1;
        $region_id = $data->region_id;
        $region_universities = Product::selectRaw('count(university_id) as uv_count,university_id')->whereHas('university', function($q) use ($region_id){
           $q->where('region_id',$region_id);
        })->groupBy('university_id')->orderBy('uv_count')->get();
        $region = Region::findOrFail($region_id);
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $categories = Category::whereHas('product', function($query) use ($region_id) {
            $query->whereHas('university', function($query) use ($region_id) {
             $query->where('region_id',$region_id);
            });
        })->get();
        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->whereHas('university', function($q) use ($region_id) {
            $q->where('region_id',$region_id);
          })->count();

        }

             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->orderBy('id','desc')->simplePaginate(28);

       return view('products.region_products',compact('products','categories','region','order_type','region_id','universities','region_universities','regions'));
      }


      public function region_products($region_id,$order_type){
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $region_universities = Product::selectRaw('count(university_id) as uv_count,university_id')->whereHas('university', function($q) use ($region_id){
           $q->where('region_id',$region_id);
        })->groupBy('university_id')->orderBy('uv_count')->get();
        $region = Region::findOrFail($region_id);
        $categories = Category::whereHas('product', function($query) use ($region_id) {
            $query->whereHas('university', function($query) use ($region_id) {
             $query->where('region_id',$region_id);
            });
        })->get();
        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->whereHas('university',     function($q) use ($region_id) {
            $q->where('region_id',$region_id);
          })->count();

        }

        switch ($order_type) {
          case 1:
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
          //cheap first................
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
          //expensive first.............
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
          //used only...............
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where( function($query) {
              $query->where('period_id','!=',null)->orWhere('period_value','!=',null);
             })->simplePaginate(28);
            break;
          case 5:
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where(function($query) {
              $query->where('period_id',null)->orWhere('period_value',null);
             })->simplePaginate(28);
            break;

          default:
            break;
        }
       return view('products.region_products',compact('products','categories','region','order_type','region_id','universities','region_universities','regions'));
      }

//region products................................................................................
      public function region_categories($region_id,$category_id,$order_type){
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $region = Region::findOrFail($region_id);
        $cat = Category::findOrFail($category_id);
        $categories = Category::whereHas('product', function($query) use ($region_id) {
            $query->whereHas('university', function($query) use ($region_id) {
             $query->where('region_id',$region_id);
            });
        })->get();
        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->whereHas('university',     function($q) use ($region_id) {
            $q->where('region_id',$region_id);
          })->count();

        }

        switch ($order_type) {
          case 1:
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
          //cheap first................
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
          //expensive first.............
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
          //used only...............
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->where( function($query) {
              $query->where('period_id','!=',null)->orWhere('period_value','!=',null);
             })->simplePaginate(28);
            break;
          case 5:
          //new only..............
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->where(function($query) {
              $query->where('period_id',null)->orWhere('period_value',null);
             })->simplePaginate(28);
            break;

          default:
            break;
        }
       return view('products.region_categories',compact('products','categories','region','order_type','region_id','category_id','cat','universities','regions'));
      }


      public function regionCategories(Request $data){
        $universities = $this->topUniversities();
        $regions = $this->regions();
          $region_id = $data->region_id;
          $order_type = $data->order_type;
          $category_id = $data->r_categories;
          $region = Region::findOrFail($region_id);
          $cat = Category::findOrFail($category_id);
        $categories = Category::whereHas('product', function($query) use ($region_id) {
            $query->whereHas('university', function($query) use ($region_id) {
             $query->where('region_id',$region_id);
            });
        })->get();
        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->whereHas('university',     function($q) use ($region_id) {
            $q->where('region_id',$region_id);
          })->count();

        }
             $products = Product::whereHas('university', function($query) use ($region_id) {
                $query->where('region_id',$region_id);
             })->where('category_id',$category_id)->orderBy('id','desc')->simplePaginate(28);
     
       return view('products.region_categories',compact('products','categories','region','order_type','region_id','category_id','cat','universities','regions'));
      }

//ordering  products   collegewise....................................................................
      public function university_products($university_id,$order_type){
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $university = University::findOrFail($university_id);
        $categories = Category::whereHas('product', function($query) use ($university_id) {
               $query->where('university_id',$university_id);
        })->get(); 

        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->where('university_id',$university_id)->count();

        }

        switch ($order_type) {
          case 1:
          //latest items...........
             $products = Product::where('university_id',$university_id)->orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
          //cheap first...........
             $products = Product::where('university_id',$university_id)->orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
          //expensive first........
             $products = Product::where('university_id',$university_id)->orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
          //used only .................
             $products = Product::where('university_id',$university_id)->where(function($query){
              $query->where('period_id','!=',null)->orWhere('period_value','!=',null);

             })->simplePaginate(28);
            break;
          case 5:
          //brand new only................
            $products = Product::where('university_id',$university_id)->where(function($query){
              $query->where('period_id',null)->orWhere('period_value',null);

             })->simplePaginate(28);
            break;

          default:
            break;
        }

         return view('products.university_products',compact('order_type','products','categories','university','universities','regions'));
      }

      public function universityProducts(Request $data){
        $universities = $this->topUniversities();
        $regions = $this->regions();
        $university_id = $data->top_universities;
        $order_type = 1; 
        $university = University::findOrFail($university_id);
        $categories = Category::whereHas('product', function($query) use ($university_id) {
               $query->where('university_id',$university_id);
        })->get(); 

        foreach ($categories as $category) {
          $category->total = Product::where('category_id',$category->id)->where('university_id',$university_id)->count();
        }

       $products = Product::where('university_id',$university_id)->orderBy('id','desc')->simplePaginate(28); 

       return view('products.university_products',compact('order_type','products','categories','university','universities','regions'));

      }

      //university category products................
      public function university_category_products($university_id,$category_id,$order_type){
          $universities = $this->topUniversities();
          $regions = $this->regions();
          $university = University::findOrFail($university_id);
          $cat = Category::findOrFail($category_id);
          $categories = Category::whereHas('product', function($query) use ($university_id) {
             $query->where('university_id',$university_id);
          })->get();
          foreach ($categories as $category) {
           $category->total = Product::where('category_id',$category->id)->where('university_id',$university_id)->count();
          } 
        switch ($order_type) {
          case 1:
          //latest.............................................
             $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->orderBy('id','desc')->simplePaginate(28);
            break;
          case 2:
          //cheap first................
             $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->orderBy('product_price','asc')->simplePaginate(28);
            break;
          case 3:
          //expensive first.............
             $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->orderBy('product_price','desc')->simplePaginate(28);
            break;
          case 4:
          //used only...............
             $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->where( function($query) {
              $query->where('period_id','!=',null)->orWhere('period_value','!=',null);
             })->simplePaginate(28);
            break;
          case 5:
          //new only..............
             $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->where(function($query) {
              $query->where('period_id',null)->orWhere('period_value',null);
             })->simplePaginate(28);
            break;

          default:
            break;
        }
           return view('products.university_categories',compact('products','categories','university','order_type','cat','universities','regions')); 
     
      }
      
      public function universityCategoryProducts(Request $data){
          $universities = $this->topUniversities();
          $regions = $this->regions();
          $university_id = $data->university_id;
          $order_type = 1;
          $category_id = $data->category_id;
          $university = University::findOrFail($university_id);
          $cat = Category::findOrFail($category_id);
          $categories = Category::whereHas('product', function($query) use ($university_id) {
             $query->where('university_id',$university_id);
          })->get();
          foreach ($categories as $category) {
           $category->total = Product::where('category_id',$category->id)->where('university_id',$university_id)->count();
          }

          $products = Product::where('university_id',$university_id)->where('category_id',$category_id)->orderBy('id','desc')->simplePaginate(28);

        return view('products.university_categories',compact('products','categories','university','order_type','cat','universities','regions'));

      }


      public function topUniversities(){
        $universities = Product::selectRaw('count(university_id) as university_count,university_id')->groupBy('university_id')->limit(20)->get();
        return $universities;
      }

      public function regions(){
        $regions = Region::orderBy('name','asc')->get();
        foreach ($regions as $region) {
           $region_id = $region->id;
           $region->products_count = Product::whereHas('university', function($q) use ($region_id){
            $q->where('region_id',$region_id);

           })->count();

        }
        return $regions;
      }


  //seach engine at region and university level(via ajax)...................
      //id in the method = region or university id
      public function search_product($level,$id,$key){
       switch ($level) {
         case 'regionLevel':
        
        $products = Product::where('product_name','LIKE',"%{$key}%")->whereHas('university', function($q) use ($id) {
          $q->where('region_id',$id);
        })->get();

        $products_count = $products->count();
        $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->get();
        $chuoproducts_count = $chuoproducts->count();
        if (($chuoproducts_count + $products_count) > 0) {
         $result = "<ul  class='nav nav-tabs nav-stacked'>";
         //iterating through found chuoproducts ................
         if ($chuoproducts_count > 0) {
             foreach ($chuoproducts as $product) {
              $result .= "<li><a href='".route('region.searched_item',[2,$id,$product->id])."'>".$product->product_name."</a></li>";
             }
          }
          //iterating through found normal people products................
         if ($products_count > 0) {
             foreach ($products as $product) {
              $result .= "<li><a href='".route('region.searched_item',[1,$id,$product->id])."'>".$product->product_name."</a></li>";

             }
          }

          $result .= "</ul>";
          return $result;

        }else{

        return "<label>Nothing matches your search...</label>";

        }
           break;

         case 'universityLevel':
                  $products = Product::where('product_name','LIKE',"%{$key}%")->where('university_id',$id)->get();
                  $result_count = $products->count();
                  $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->get();
                  $chuoproducts_count = $chuoproducts->count();
                  if (($result_count + $chuoproducts_count) > 0) {
                    $result = "<ul  class='nav nav-tabs nav-stacked'>";
                     if ($result_count > 0) {
                       foreach ($products as $product) {
                        $result .= "<li><a href='".route('university.searched_item',[1,$id,$product->id])."'>".$product->product_name."</a></li>";
                       }
                     }
                     if ($chuoproducts_count > 0) {
                         foreach ($chuoproducts as $product) {
                          $result .= "<li><a href='".route('university.searched_item',[2,$id,$product->id])."'>".$product->product_name."</a></li>";
                         }
                       
                     }


                      $result .= "</ul>";
                      return $result;
                   
                  }else{
                    return "<label>Nothing matches your search...</label>";
                   }
               
           break;

         
         default:
           # code...
           break;
       }

      }
//nation item search results.......................................................
      public function nation_search_results($order,$product_id){
          $universities = $this->topUniversities();
          $regions = $this->regions(); 
          $level = "nationLevel";
          switch ($order) {
            case 1:
                $product = Product::findOrFail($product_id);
                $more_related_items = Product::where('id','!=',$product->id)->where('category_id',$product->category_id)->orderBy('brand_id','asc')->paginate(24);
                $more_related_count = $more_related_items->count();
              if ($product->category_id == 1 || $product->category_id == 2) {
                   $chuoproducts = Chuoproduct::where('chuoproductType_id',$product->category_id)->limit(10)->orderBy('brand_id','asc')->get();
                    $chuoproducts_count = $chuoproducts->count();
              }else{
                $chuoproducts_count = 0;
              }
             
              return view('products.searchResults',compact('product','more_related_items','more_related_count','universities','regions','level','order','chuoproducts_count','chuoproducts')); 
              break;

            case 2:
              $chuoproduct = Chuoproduct::findOrFail($product_id);
              $more_related_items = Chuoproduct::where('id','!=', $product_id)->where('chuoproductType_id',$chuoproduct->chuoproductType_id)->orderBy('brand_id','asc')->paginate(10);
              $more_related_count = $more_related_items->count();
              $related_normal_products = Product::where('category_id',$chuoproduct->chuoproductType_id)->limit(17)->orderBy('brand_id','asc')->get();

              return view('products.searchResults',compact('chuoproduct','more_related_items','more_related_count','universities','regions','level','order','related_normal_products')); 
              
              break;
            
            default:
              # code...
              break;
          }

      }

//region item search results..................................................
      public function region_search_results($order,$region_id,$product_id){
          $universities = $this->topUniversities();
          $regions = $this->regions();
       switch ($order) {
         case 1:
         $product = Product::findOrFail($product_id);
         // $product_region = $product->university->region_id;
         $more_related_items = Product::where('id','!=',$product_id)->where('category_id',$product->category_id)->where('university_id',$product->university_id)->orderBy('brand_id','asc')->get();

         $less_related_items = Product::where('id','!=',$product_id)->where('category_id',$product->category_id)->where('university_id','!=',$product->university_id)->whereHas('university', function($q) use ($region_id) {
            $q->where('region_id',$region_id);
         })->orderBy('brand_id','asc')->get();
         //checking if product category matches with any of chuobusiness categories....(1or2)
         if ($product->category_id == 1 || $product->category_id == 2) {
              $chuoproducts = Chuoproduct::where('chuoproductType_id',$product->category_id)->orderBy('brand_id','asc')->get();
              $chuoproducts_count = $chuoproducts->count();
         }else{
          $chuoproducts_count = 0;
         }

         $less_related_count = $less_related_items->count();
         $more_related_count = $more_related_items->count();
         $level = 'regionLevel';
     return view('products.searchResults',compact('product','less_related_items','more_related_items','less_related_count','more_related_count','universities','regions','level','order','chuoproducts_count','chuoproducts')); 

           break;
         case 2:
           $chuoproduct = Chuoproduct::findOrFail($product_id);
           $more_chuoproducts = Chuoproduct::where('id','!=',$product_id)->where('chuoproductType_id',$chuoproduct->chuoproductType_id)->limit(4)->orderBy('brand_id','asc')->get();

            $related_products = Product::where('category_id',$chuoproduct->chuoproductType_id)->whereHas('university', function($q) use($region_id) {
               $q->where('region_id',$region_id);
            })->orderBy('brand_id','asc')->get();
            $level = 'regionLevel';
            return view('products.searchResults',compact('chuoproduct','level','order','more_chuoproducts','related_products','universities','regions'));
           break;
         
         default:
           return "<h2><b>PAGE NOT FOUND...............</b></h2>";
           break;
       }

      }
//university item search results.......................................................
      public function university_search_results($order,$location_id,$product_id){
          $universities = $this->topUniversities();
          $regions = $this->regions();
       switch ($order) {
         case 1:
         $product = Product::findOrFail($product_id);
         $region_id = $product->university->region_id;
         $more_related_items = Product::where('id','!=',$product_id)->where('category_id',$product->category_id)->where('university_id',$product->university_id)->orderBy('brand_id','asc')->get();

         $less_related_items = Product::where('id','!=',$product_id)->where('category_id',$product->category_id)->where('university_id','!=',$product->university_id)->whereHas('university', function($q) use ($region_id) {
            $q->where('region_id',$region_id);
         })->orderBy('brand_id','asc')->get();
         //checking if product category matches with any of chuobusiness categories....(1or2)
         if ($product->category_id == 1 || $product->category_id == 2) {
              $chuoproducts = Chuoproduct::where('chuoproductType_id',$product->category_id)->limit(5)->orderBy('brand_id','asc')->get();
              $chuoproducts_count = $chuoproducts->count();
         }else{
          $chuoproducts_count = 0;
         }

         $less_related_count = $less_related_items->count();
         $more_related_count = $more_related_items->count();
         $level = 'universityLevel';
     return view('products.searchResults',compact('product','less_related_items','more_related_items','less_related_count','more_related_count','universities','regions','level','order','chuoproducts_count','chuoproducts')); 

           break;
         case 2:
         $uv = University::findOrFail($location_id);
         $region_id = $uv->region_id;
           $chuoproduct = Chuoproduct::findOrFail($product_id);
           $more_chuoproducts = Chuoproduct::where('id','!=',$product_id)->where('chuoproductType_id',$chuoproduct->chuoproductType_id)->limit(4)->orderBy('brand_id','asc')->get();

            $more_related_items = Product::where('category_id',$chuoproduct->chuoproductType_id)->where('university_id',$location_id)->orderBy('brand_id','asc')->get();

         $less_related_items = Product::where('category_id',$chuoproduct->chuoproductType_id)->where('university_id','!=',$location_id)->whereHas('university', function($q) use ($region_id) {
            $q->where('region_id',$region_id);
         })->orderBy('brand_id','asc')->get();

            $level = 'universityLevel';
            return view('products.searchResults',compact('chuoproduct','level','order','more_chuoproducts','more_related_items','less_related_items','universities','regions'));
           break;
         
         default:
           return "<h2><b>PAGE NOT FOUND...............</b></h2>";
           break;
       }

      }

   //seach engine requests handling method...................
      public function product_search($level,$key){
       switch ($level) {
         case 'nationLevel':
        
        $products = Product::where('product_name','LIKE',"%{$key}%")->get();
        $products_count = $products->count();
        $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->get();
        $chuoproducts_count = $chuoproducts->count();
        if (($chuoproducts_count + $products_count) > 0) {
         $result = "<ul  class='nav nav-tabs nav-stacked'>";
         //iterating through found chuoproducts ................
         if ($chuoproducts_count > 0) {
             foreach ($chuoproducts as $product) {
              $result .= "<li><a href='".route('nationwise.searched_item',[2,$product->id])."'>".$product->product_name."</a></li>";
             }
          }
          //iterating through found normal people products................
         if ($products_count > 0) {
             foreach ($products as $product) {
              $result .= "<li><a href='".route('nationwise.searched_item',[1,$product->id])."'>".$product->product_name."</a></li>";

             }
          }

          $result .= "</ul>";
          return $result;

        }else{

        return "<label>Nothing matches your search...</label>";

        }
           break;

         case 'college':
                  $universities = University::where('name','LIKE',"%{$key}%")->orWhere('aka','LIKE',"%{$key}%")->get();
                  $result_count = $universities->count();
                  if ($result_count > 0) {
                    $result = "<ul  class='nav nav-tabs nav-stacked'>";
                     foreach ($universities as $product) {
                      $result .= "<li><a href='".route('university_products',[$product->id,1])."'>".$product->name."</a></li>";
                     }
                      $result .= "</ul>";
                      return $result;
                   
                  }else{
                    return "<label>Nothing matches your search...</label>";
                   }
               

           break;

         
         default:
           # code...
           break;
       }

      }
//product search via normal form submission.....................................................
      public function productSearch(Request $data){
        $level = $data->level;
        $key = $data->key;
        $universities = $this->topUniversities();
        $regions = $this->regions();

      switch ($level) {
         case 'nationLevel':
        
        $products = Product::where('product_name','LIKE',"%{$key}%")->get();
        $products_count = $products->count();
        $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->get();
        $chuoproducts_count = $chuoproducts->count();

          return view('products.search_results',compact('products','chuoproducts','chuoproducts_count','products_count','level','key','universities','regions'));

           break;

         case 'regionLevel':
         $region_id = $data->region_id;
          $products = Product::whereHas('university', function($query) use($region_id) {
            $query->where('region_id',$region_id);
          })->where('product_name','LIKE',"%{$key}%")->get(); 
          $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->limit(4)->get();
          $products_count = $products->count();
          $chuoproducts_count = $chuoproducts->count();

          return view('products.search_results',compact('level','key','universities','regions','products','chuoproducts','products_count','chuoproducts_count'));           


           break;

         case 'universityLevel':
          $university_id = $data->university_id;  
          $products = Product::where('university_id',$university_id)->where('product_name','LIKE',"%{$key}%")->get(); 
          $chuoproducts = Chuoproduct::where('product_name','LIKE',"%{$key}%")->limit(4)->get();
          $products_count = $products->count();
          $chuoproducts_count = $chuoproducts->count();

          return view('products.search_results',compact('level','key','universities','regions','products','chuoproducts','products_count','chuoproducts_count'));
           break;

         case 'college':
                  $colleges = University::where('name','LIKE',"%{$key}%")->orWhere('aka','LIKE',"%{$key}%")->get();
                  $result_count = $colleges->count();
                        
               return view('products.search_results',compact('level','key','universities','regions','colleges','result_count'));
               

           break;

         
         default:
           # code...
           break;
       }




      }


}

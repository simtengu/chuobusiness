@extends('layouts.user_profile')
  
@section('content')
<!-- new product section............................................. -->
      <div id="new_product" class="mb-2 py-3">
        <h3 style="color: #8cc2ff; font-family: arial-narrow" class="mb-2">Create new product</h3>
        <!-- <span><span class="text-danger">*</span> = optional field</span> -->
        <form id="product_save" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
          @csrf
          <input id="form_id" type="hidden" value="{{ $form_id }}" name="form_id">
          <input id="img_check" type="hidden" name="img_check">
          <div id="nwProductFmrow"  class="d-flex">
            <div class="form-group col-sm-6">
              <label for="item_name" class="text-18 text-arial">Name(Title)</label>
              <input name="product_name" type="text" class="form-control" id="item_name" placeholder="eg: iphone 6, school bag, dell e23090" required>
            </div>
            <div class="form-group col-sm-6">
              <label for="category_name" class="text-18 text-arial">Type(Category)</label>
               <select required id="category_name" name="category_id" class="form-control">
                 <option value="" selected>Select Category</option>
                 @foreach($cats as $category)
                  <option value="{{ $category->id }}">{{  $category->name }}</option>
                 @endforeach
               </select>
                <span id="category_check" style="font-size: 14px" class="d-none text-danger p-0 m-0"></span>
            </div>            
          </div>

          <div id="nwProductFmrow"  class="d-flex">
            <div class="form-group col-sm-6">
              <label for="pPrice" class="text-18 text-arial">Price(Tsh)</label>
              <input name="product_price" type="number" class="form-control" id="pPrice" placeholder="eg: 50000,1000000" min="1" required>
            </div>
            <div id="brandDiv" class="form-group col-sm-6">
              <label for="brand_name" class="text-18 text-arial">Brand(if any)</label>
               <select id="brand_name" name="brand_id" class="form-control">
                 <option value="" selected>Select Brand</option>
                 @foreach($brands as $brand)
                  <option value="{{ $brand->id }}">{{  $brand->name }}</option>
                 @endforeach
               </select>
            </div>
            <div id="street_name_div" style="display: none;" class="form-group col-sm-6">
              <label for="street_name" class="text-18 text-arial">Street Name</label>
              <input name="street_name" type="text" class="form-control" id="street_name" placeholder="type street name" >
            </div>

          </div>

            <div class="row">
            <div id="PCondition" class="form-group col-sm-6 pl-4">
              <label class="text-18 text-arial">Item Condition</label>
              <div class="d-flex ">
                <p class="mr-4"><input type="radio" name="condition" id="new_radio" value="new" checked>&nbsp; New</p>
                <p><input type="radio" name="condition" value="used" id="used_radio">&nbsp; Used</p>
              </div>
            </div>

          <div id="productConditionDiv" class="form-group col-sm-6" style="display: none;">
              <label for="pTime" class="text-18 text-arial">product used for</label>
              <div class="d-flex">
                   <input name="period_value" type="number"  id="pTime" min="0" placeholder="eg: 2">
                   <select id="pForm" name="period_id" class="input-border">
                     <option value="" selected>specify period</option>
                     <option value="1">day(s)</option>
                     <option value="2">week(s)</option>
                     <option value="3">month(s)</option>
                     <option value="4">year(s)</option>
                   </select>                                
              </div>
              <div class="d-flex">
                 <span id="period_check" style="font-size: 14px" class="d-none text-danger p-0 m-0"></span>
              <span id="periodForm_check" style="font-size: 14px" class="d-none text-danger pl-5 ml-5"></span>  
              </div>
            </div>

 <!--  product images..................................... -->
            <div class="form-group col-12  ml-2">
                 <div id="product_img" class="row">
                   <div id="img">
                     
                   </div>
                 </div>
                 <!-- <img style="max-width: 150px; height: auto;"  src="{{asset('/images/8.jpg') }}" class="img-thumbnail mx-1"> -->
            </div>
            <div id="imgPreviewContainer" style="display: none;" class="form-group col-6 col-md-4">
              <img class="img-fluid" id="image_preview" src="">
            </div>

            <div class="form-group col-12  ml-2">
                <label id="img_message" class="text-18 text-arial">Item Images</label><br>
                <span id="imgMessage" class="text-warning text-arial text-17">Image width should be greater than its height&First image is item's main image</span><br>
                <label class="btn btn-outline-info mt-2" for="product_image">Add Image</label>
                 <input class="d-none" id="product_image" type="file" name="product_image" value="" accept="image/*">
                 <button  role="button" type="button" class="btn btn-danger d-none" id="imgBTN">click</button>
            </div>
            </div>
            <div class="p-3">
              <label for="pDescription" class="text-18 text-arial">Enter product description</label>
              <textarea name="product_description" class="form-control" rows="5" required id="pDescription"></textarea>
              <span id="description_check" style="font-size: 14px" class="d-none text-danger p-0 m-0"></span>
            </div>
            <div class="p-3"><p style="font-family: times new roman">You can make this Item <span class="text-warning" data-toggle="tooltip" title="Premium products have a special section in our homepage,we advertise them also in other platforms apart from this system">Premium </span>through a premium section found among your Menu links</p></div>
          
          <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Save Product</button>
      </form> 
      </div>
 <!--     end of new prodcut......................................... -->
 @stop
 @section('scripts')
<script type="text/javascript">
  
 $(document).ready(function(){
   //handling product condition section......................
   $('[data-toggle="tooltip"]').tooltip(); 
   $("#used_radio").click(function(){
      $("#productConditionDiv").show();
   });

     $("#new_radio").click(function(){
      $("#productConditionDiv").hide();
      $("#pTime").val("");
      $("#pForm").val("");
   }); 

    $("#category_name").change(function(){
        var categoryId = $(this).val();
        if (categoryId == 3) {

        $("#PCondition").hide();
        $("#street_name_div").show();
        $("#productConditionDiv").hide();
        $("#brandDiv").hide();
        $("#pTime").val("");
        $("#pForm").val("");
  
        }else{
          $("#street_name").val(null);
          $("#street_name_div").hide();
          $("#PCondition").show();
          $("#brandDiv").show();
        }
    });
//image upload section.............
    $("#imgBTN").click(function(){
             var imgWidth = $("#image_preview").get(0).naturalWidth;
             var imgHeight = $("#image_preview").get(0).naturalHeight;
               if (imgWidth > imgHeight) {
               $.ajax({
                     url: "{{ route('image_save') }}",
                     method: "POST",
                     data: new FormData($("#product_save")[0]),
                     dataType: "json",
                     processData: false,
                     contentType: false,
                     cache: false,
                    beforeSend: function(){
                             $("#document-loader-div").show();
                      },
                    complete: function(){
                             $("#document-loader-div").hide();
                      },
                     success: function(rs){
                      $("#product_img #img:last").after(rs.img);
                       $("#img_check").val("yes");
                        $("#image_preview").attr('src',"");
                        $("#imgPreviewContainer").hide();
                        $("#img_message").text("");
                      },
                     error: function(xhr){
                        $.each(xhr.responseJSON.errors, function(key,value){
                        $("#img_message").text(value[0]).removeClass("text-info").addClass("text-danger"); 
                         $("#image_preview").attr('src',"");
                        $("#imgPreviewContainer").hide();
                         
                        });
                      }

               });           

               }else{
                $("#image_preview").attr('src',"");
                $("#imgPreviewContainer").hide();
                alert("PLEASE MAKE SURE THE WIDTH OF YOUR IMAGE IS GREATER THAN ITS HEIGHT(for better display)")
               }
              
    });

    //item images upload..................................................
    $("#product_image").change(function(event){
        if (event.target.files.length > 0) {
              var url = URL.createObjectURL(event.target.files[0]);
              $("#image_preview").attr('src',url);
              $("#imgPreviewContainer").show(function(){
                $("#imgBTN").click();
              });
        }

    });

 //product image delete.................................

 $("#product_img").on("click","#delete",function(event){
    event.preventDefault();
    var img_id = $(this).next().val();
    var parent_body = $(this).parent();
    $.ajax({
          url: "{{ url('/product/ajax_image_delete') }}" + "/"+ img_id,
          method: "GET",
          success: function(img_count){
            parent_body.remove();
            if (img_count < 1) {
              $("#img_check").val("");
            }
          },
          error: function(){
            alert("something went wrong..Wait a moment then try again")
          }
    });
 });
//end of product image delete...........................
//image check....................................
var img_checkF  = $("#img_check");
 function imageCheck(){
  var img = img_checkF.val();
  if (img == "") {
      $("#img_message").text("upload atleast one image of your Item").removeClass("text-success").addClass("text-danger");
      return false;
  }else{
    return true;
  }

}

 $("#product_save").on("submit", function(event){
  imageCheck();
   if (imageCheck()) {
      $("#product_save").submit();
   }else{
    event.preventDefault();
   }

 });

 });

</script>
 
 
@endsection
@extends('layouts.user_profile')
@section('content')
       <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update item</h3>
       <div id="images-div" class="row p-2 mt-3">
        <div id="img"></div>
      @if($product->image->count() > 0)
       	@foreach($product->image as $photo)
         <div id="img" class="col-6 col-sm-3">
           <img src="{{ asset('pictures') }}/{{ $photo->name }}" class="img-thumbnail img-fluid">
           <a href="{{ route('delete_picture',$photo->id) }}" class="text-danger p-2">Delete</a>
         </div>
         @endforeach
        @else
         <center id="imagesCountMessage" class="text-danger">you need atleast one image for your item</center>
      @endif
        

       </div>

      <div id="new_product" class="mb-2 pt-2">
        {!! Form::model($product,['method'=>'PATCH','action'=>['ChuoproductsController@update',$product->id],'id'=>'product_save','files'=>true]) !!}
        <input id="form_id" type="hidden" value="{{ $product->id }}" name="form_id">
          <div   class="row">
            <div class="form-group col-sm-6">
            {!! Form::label('item_name','Product name') !!}
            {!! Form::text('product_name',null,['class'=>'form-control','id'=>'item_name','required'=>'required']) !!}
            </div>

            <div class="form-group col-sm-6">
              {!! Form::label('chuoproductType_id','Type(category)') !!}
              {!! Form::select('chuoproductType_id',$cats,null,['class'=>'form-control','id'=>'chuoproductType_id','required'=>'required']) !!}
                
            </div>            
            <div class="form-group col-sm-6">
             {!! Form::label('pPrice','Product price(Tsh)') !!}
             {!! Form::number('product_price',null,['class'=>'form-control','id'=>'pPrice','required'=>'required','min'=>'1']) !!}           
            </div>
            <div id="brandDiv" class="form-group col-sm-6">
              {!! Form::label('brand_name','Product Brand') !!}
              {!! Form::select('brand_id',$brands,null,['class'=>'form-control','required'=>'required']) !!}
            </div> 
            <div class="form-group col-sm-6">
              {!! Form::label('os_id','OS') !!}
              {!! Form::select('os_id',$os,null,['class'=>'form-control','required'=>'required']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_camera','Camera') !!}
            {!! Form::text('product_camera',null,['class'=>'form-control','id'=>'product_camera']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_ram','Ram') !!}
            {!! Form::text('product_ram',null,['class'=>'form-control','id'=>'product_ram','required'=>'required']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_processor','Processor') !!}
            {!! Form::text('product_processor',null,['class'=>'form-control','id'=>'product_processor','required'=>'required']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_model','Model') !!}
            {!! Form::text('product_model',null,['class'=>'form-control','id'=>'product_model']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_display','Display Size') !!}
            {!! Form::text('product_display',null,['class'=>'form-control','id'=>'product_display']) !!}
            </div>

            <div class="form-group col-sm-6">
            {!! Form::label('product_release_date','Released On') !!}
            {!! Form::text('product_release_date',null,['class'=>'form-control','id'=>'product_release_date']) !!}
            </div>
          </div>

          <div class="row pl-1">
            <div id="PCondition" class="form-group col-sm-6 pl-4">
              <label>Item Condition</label>
              <div class="d-flex ">
                <p class="mr-4"><input type="radio" name="condition" id="new_radio" value="new" checked>&nbsp; New</p>
                <p><input type="radio" name="condition" value="used" id="used_radio">&nbsp; Used</p>
              </div>
            </div>
            <div id="productConditionDiv" class="form-group col-sm-6">
              {!! Form::label('pTime','Product used for') !!}
              <div class="d-flex justify-content-start">
              {!! Form::number('period_value',null,['class'=>'form-control','id'=>'pTime','min'=>'1']) !!}

              {!! Form::select('period_id',$periods,null,['class'=>'input-border','id'=>'pForm']) !!}

              </div>
            </div> 
            <div id="imgPreviewContainer" style="display: none;" class="form-group col-6 col-md-4">
              <img class="img-fluid" id="image_preview" src="">
            </div>

           <div class="col-12">
            <div class="form-group col-sm-6">
              <label id="img_message">Item Images</label><br>
              <label class="btn btn-outline-info mt-2" for="product_image">Add Image</label>
                <input class="d-none" id="product_image" type="file" name="product_image" accept="image/*">
                <button  role="button" type="button" class="btn btn-danger d-none" id="imgBTN">
            </div>
           </div>

          </div>
            
            <div class="p-3">
              {!! Form::label('pDescription','Product description') !!}
              {!! Form::textarea('product_description',null,['class'=>'form-control','rows'=>'5','id'=>'pDescription']) !!}
              <span id="description_check" style="font-size: 14px" class="d-none text-danger p-0 m-0"></span>
            </div>
          
          <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update Product</button>
      {!! Form::close() !!}
      </div>
@endsection
@section('scripts')

 <script type="text/javascript">
   

  $(document).ready(function(){

   if ($("#pTime").val() == "" || $("#pTime").val() == null) {
  $("#pForm").val("");

   }
   //item condition handling.......................
   $("#used_radio").click(function(){
      $("#productConditionDiv").show();
   });

     $("#new_radio").click(function(){
      $("#productConditionDiv").hide();
      $("#pTime").val(null);
   });

   //product images upload...........................................
    $("#imgBTN").click(function(){
             var imgWidth = $("#image_preview").get(0).naturalWidth;
             var imgHeight = $("#image_preview").get(0).naturalHeight;
               if (imgWidth > imgHeight) {
                 $.ajax({
                       url: "{{ route('product_picture_save') }}",
                       method: "POST",
                       data: new FormData($("#product_save")[0]),
                       dataType: "json",
                       processData: false,
                       contentType: false,
                       cache: false,
                       beforeSend: function(){
                           $("#document-loader-div").show(); },
                       complete: function(){
                           $("#document-loader-div").hide(); },
                       success: function(rs){
                        $("#images-div #img:last").after(rs.img);
                         $("#img_message").text("image uploaded successful").removeClass("text-danger").addClass("text-success");
                         $("#imagesCountMessage").hide();
                          $("#image_preview").attr('src',"");
                          $("#imgPreviewContainer").hide();
                        },
                       error: function(xhr){
                          $.each(xhr.responseJSON.errors, function(key,value){
                          $("#img_message").text(value[0]).removeClass("text-success").addClass("text-danger");  
                            $("#image_preview").attr('src',"");
                            $("#imgPreviewContainer").hide();
                          });
                        }

                 });
               }else{
                $("#image_preview").attr('src',"");
                $("#imgPreviewContainer").hide();
                alert("PLEASE MAKE THE WIDTH OF YOUR IMAGE GREATER THAN ITS HEIGHT(for better display)")
               }
              
    });


 $("#product_image").change(function(){

        if (event.target.files.length > 0) {
              var url = URL.createObjectURL(event.target.files[0]);
              $("#image_preview").attr('src',url);
              $("#imgPreviewContainer").show(function(){
                $("#imgBTN").click();
              });
        }

 });

  });



 </script>
 
@endsection

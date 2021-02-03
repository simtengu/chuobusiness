@extends('layouts.admin')           
@section('content')
  <div class="container-fluid">
        <!--  delete form section.................................... -->
       <div id="delete-form" class="text-center">
         {!! Form::open(['method'=>'DELETE','action'=>['AdminProductsController@destroy',$product->id]]) !!}
           <h4  class="text-light">Confirm product delete</h4>
           <button type="submit" class="btn btn-danger btn-sm px-3">ok</button>
         {!! Form::close() !!}
       </div> 
   <!--     end of delete form section............................. -->
        @if(session()->has('updated'))
        <div class="row">
          <div class="col-12 pt-3">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
             <span>{{ session('updated') }}</span>
            </div>
          </div>
        </div>
        @endif
       <div class="row p-2 mt-3">
        @if(count($product->image))
        @foreach($product->image as $photo)
         <div class="col-6 col-sm-3">
           <img src="{{ asset('pictures') }}/{{ $photo->name }}" class="img-thumbnail img-fluid">
         </div>
         @endforeach
         @else
         <center id="imagesCountMessage" class="text-danger">you need atleast one image for your item</center>
         @endif
       </div>
       <div class="row p-2">
        <div class="col-md-6">
         <h4 class="text-times">{{ $product->product_name }}</h4>
         @if($product->period_value )<h5 class="text-times">Used for {{ $product->period_value }} {{ $product->period->name }}@if($product->period_value != 1)s @endif</h5> @endif 
         <h5 class="text-times">{{ $product->product_price }} <span class="text-info">Tsh</span></h5> 
        </div>
        <div class="col-md-6">
          <div class="car p-2">
            <h4 class="text-info text-dark text-times">product description</h4>
           <p class="text-lead text-justify text-times">{{ $product->product_description ?? "---" }} </p>  
          </div>
          
        </div>

        <div class="col-md-8 mt-2">
        <table class="table table-bordered">
          <tbody>
          <tr class="techSpecRow"><th colspan="2">More Details</th></tr>
          <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{ $product->brand->name }}</td></tr>
          <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">{{ $product->product_model ?? "---" }}</td></tr>
                  <tr class="techSpecRow"><td class="techSpecTD1">RAM:</td><td class="techSpecTD2">{{ $product->product_ram }}</td></tr>
                  <tr class="techSpecRow"><td class="techSpecTD1">processor:</td><td class="techSpecTD2">{{ $product->product_processor }}</td></tr>
                  <tr class="techSpecRow"><td class="techSpecTD1">OS:</td><td class="techSpecTD2">{{ $product->os->name }}</td></tr>
                  <tr class="techSpecRow"><td class="techSpecTD1">Camera:</td><td class="techSpecTD2">{{ $product->product_camera ?? "---" }}</td></tr>
          <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> {{ $product->product_release_date ?? "---" }}</td></tr>
          <tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">{{ $product->product_display ?? "---" }}</td></tr>
          </tbody>
        </table>
         <div class="d-flex mt-4">
          <a class="btn btn-warning btn-sm mr-3" href="{{ route('adminProduct.edit',$product->id) }}">Update</a>
           <button id="delete-button" class="btn btn-danger btn-sm">Delete</button>
         </div>
        </div>

       </div> 
  </div>
@endsection   
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      
    $(document).click(function(){
        $("#delete-form").hide("slow");
      });

      $("#delete-button").click(function(event){
          event.stopPropagation();
          $("#delete-form").slideDown();  
      });

    });
</script>
@endsection
@extends('layouts.user_profile')
@section('content')
        <!--  delete form section.................................... -->
       <div id="delete-form" class="text-center">
         {!! Form::open(['method'=>'DELETE','action'=>['ProductsController@destroy',$product->id]]) !!}
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
        @if(count($product->photo))
       	@foreach($product->photo as $photo)
         <div class="col-6 col-sm-3">
           <img src="{{ asset('images') }}/{{ $photo->name }}" class="img-thumbnail img-fluid">
         </div>
         @endforeach
         @else
         <center id="imagesCountMessage" class="text-danger">you need atleast one image for your item</center>
         @endif
       </div>
       <div class="row p-2">
        <div class="col-md-6">
         <h5 class="text-times text-18">{{ $product->product_name }}</h5>
         @if($product->period_value )<h5 class="text-times text-16">Used for {{ $product->period_value }} {{ $product->period->name }}@if($product->period_value != 1)s @endif</h5> @endif 
         <h5>{{ $product->product_price }} <span class="text-info">Tsh</span></h5> 
         <h5 class="text-times text-18">Category: {{ $product->category->name }}</h5>
         @if($product->brand)<h5 class="text-times text-18">Brand: {{ $product->brand->name }}</h5>@endif
         @if($product->street_name)<h5 class="text-times text-18">Street: {{ $product->street_name }}</h5>@endif
        </div>
        <div class="col-md-6">
          <div class="car p-2">
            <h4 class="text-info text-dark text-times text-19">product description</h4>
           <p class="text-lead text-justify text-times">{{ $product->product_description }} </p>  
          </div>
        </div>
        <div class="col-12">
         <div class="d-flex">
          <a class="btn btn-warning btn-sm mr-3" href="{{ route('product.edit',$product->slug) }}">Update</a>
           <button id="delete-button" class="btn btn-danger btn-sm">Delete</button>
         </div>
        </div>

       </div>
@endsection

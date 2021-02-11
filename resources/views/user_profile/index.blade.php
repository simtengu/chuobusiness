@extends('layouts.user_profile')

@section('content')
      <div id="profile-main-div" class="p-2 mt-4">
      @if(session()->has('product_added'))
        <div class="row">
          <div class="col-12 pt-3">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
             <span>{{ session('product_added') }}</span>
            </div>
          </div>
        </div>
        @endif
        @if(session()->has('product_deleted'))
        <div class="row">
          <div class="col-12 pt-3">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
             <span>{{ session('product_deleted') }}</span>
            </div>
          </div>
        </div>
        @endif
<!-- products section................................................... -->
        <div id="profile-content">
      @if(count($products))
         @foreach($products as $product)
          
          <a id="link" href="{{ route('product.show',$product->slug) }}">
          <div id="product-div" >
            <table id="products_table">
             <tr>
               <td><h5 class="text-dark">{{ $product->product_name }}</h5></td>
               <td class="d-none d-md-block">
                <span class="text-dark">
                @if($product->period_value)
                Used for {{ $product->period_value }} {{ $product->period->name }}@if($product->period_value != 1)s @endif </span>
                 @else
                 <span>Brand New</span>
                @endif
              </td>
               <td id="right" rowspan="2">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</td>
             </tr>
             <tr>
               <td><span id="cyan-color-span">{{ $product->product_price }} <label class="text-warning">Tsh</label></span></td>
               <td class="d-none d-md-block"><span id="cyan-color-span">posted {{ $product->created_at->diffForHumans() }}</span> </td>
               
             </tr>             
             </table>
          </div>
        </a>
        @endforeach
       @else 
       <h4 class="text-info text-uppercase">you don't have products yet</h4>
      @endif

   <!--    pagination..................... -->
         <div class="text-center mt-2">
           @if(count($products))
            {{ $products->render()}}
            @endif
         </div>        
        </div>

      </div>
<!-- end of products section....................................... -->

 @stop

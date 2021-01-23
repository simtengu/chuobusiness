@extends('layouts.user_profile')

@section('content')
      <div id="profile-main-div" class="p-2 mt-4">
<!-- products section................................................... -->
        <div id="profile-content">
        <div class="p-2 mb-1">
          <div class="card mb-2">
            <div id="premium_heading" class="card-header text-info"> <h5 style="font-family: arial narrow">Why you should consider upgrading your product to premium</h5></div>
            <div class="card-body" style="font-family: times new roman;">
              
                <p><span class="font-weight-bold text-info mr-2" style="font-size: 15px;">></span>Premium products have a special section in our homepage which makes them reachable easily by most of visitors</p>
                <p><span class="font-weight-bold text-info mr-2" style="font-size: 15px;">></span>Premium products have a special page </p>
                <p><span class="font-weight-bold text-info mr-2" style="font-size: 15px;">></span>Premium products are advertised with high priority than other normal products hence they receive high number of views than other products </p>
                <p><span class="font-weight-bold text-info mr-2" style="font-size: 15px;">></span>Premium products are used when we are promoting this system in other platforms</p>
              
              <label class="text-info">Price = 1000/week,4000/month</label>
            </div>
          </div>
        </div>
      @if(count($products) > 0)
          <div class="card mb-1">
            <div class="card-header">
             <h4 id="premium_heading2" class="text-info mt-2" style="font-family: arial narrow">Select the product you wish to upgrade to premium</h4> 
            </div> 
          </div>
         @foreach($products as $product)
          <a id="link" href="{{ route('premium_confirm',$product->id) }}">
          <div id="product-div" >
            <table id="products_table">
             <tr>
               <td><h5 class="text-dark">{{ $product->product_name }} @if($product->premium == 1)<span class="text-warning">(prem)</span> @endif</h5></td>
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
   <!--    pagination..................... -->
         <div class="text-center mt-2">
           {{ $products->render()}}
         </div>  
         @else
             <div class="text-center jumbotron">
                <h4 class="text-dark">Add products first.</h4>
             </div>
     @endif      
        </div>

      </div>
<!-- end of products section....................................... -->
 @stop

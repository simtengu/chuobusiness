 @extends('layouts.homepage')
@section('content')
<div class="row">
		<div class="span9">		
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
         <h4 class="text-orange">All Premium Products</h4>
		</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;">
		
	     @if(count($products))

             @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }}</h5>
			                  <label class="mb-0 text-dark">{{ number_format($product->product_price)  }} <span class="text-orange">Tsh</span></label>
			                <p style="line-height: 18px;">
			                  {{ Str::limit($product->product_description,45) }}
			                </p>
	                	</div>
	                </div>
               	</a>	
               </div>
				@endif
			   @endforeach

		 @else
		  <h4 class="text-info">NO PRODUCTS YET</h4> 
	     @endif
		</div>
            @if(count($products))
	         <div class=" mt-2">
	           {{ $products->render()}}
	         </div> 
	        @endif

		</div>
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
  @include('includes.sidebar')
	</div>
<!-- Sidebar end=============================================== -->
	</div>
@endsection
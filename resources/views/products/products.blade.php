@extends('layouts.homepage')
@section('all_categories')
 @include('includes.categories_section')
@endsection
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3" >
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->slug }}/latest">{{ $category->name }} <span class="badge">{{ $category->total }}</span></a> </li>
			@endforeach
		</ul>
		<br/>
		  <div style="text-align: center;" class="thumbnail">
             <h3 class="text-times text-18 text-blue">Advertise here</h3>
		  </div><br/>
       @include('includes.sidebar')
	</div>
<!-- Sidebar end=============================================== -->
		<div  class="span9">		
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ route('products.order_type','latest') }}" class="btn btn-outline-secondary">Latest @if($order_type == "latest") <span class="badge">{{ count($products) }}</span> @endif</a>	
	      <a href="{{ route('products.order_type','cheap-first') }}" class="btn btn-outline-secondary">cheap first
           @if($order_type == "cheap-first") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ route('products.order_type','expensive-first') }}" class="btn btn-outline-secondary">expensive first
	      	@if($order_type == "expensive-first") <span class="badge">{{ count($products) }}</span> @endif
	      </a>
	      <a href="{{ route('products.order_type','used-only') }}" class="btn btn-outline-secondary">used only
          @if($order_type == "used-only") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ route('products.order_type','new-only') }}" class="btn btn-outline-secondary">new only
           @if($order_type == "new-only") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
		</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important; padding-left: 3px;">
		
	  @if(count($products))
	    @if($order_type == "latest")
	           @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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
		    @elseif($order_type == "cheap-first")
	           @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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

		    @elseif($order_type == "expensive-first")
	           @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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

		    @elseif($order_type == "used-only")
	           @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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
		   @elseif($order_type == "new-only")
	           @foreach($products as $product)
	            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-16">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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
          @endif
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
	</div>
@endsection
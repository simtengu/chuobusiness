@extends('layouts.homepage')
@section('all_categories')
 @include('includes.categories_section')
@endsection
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->id }}/1">{{ $category->name }}</a></li>
			@endforeach
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ route('products.order_type',1) }}" class="btn btn-outline-secondary">Latest @if($order_type == 1) <span class="badge">{{ count($products) }}</span> @endif</a>	
	      <a href="{{ route('products.order_type',2) }}" class="btn btn-outline-secondary">cheap first
           @if($order_type == 2) <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ route('products.order_type',3) }}" class="btn btn-outline-secondary">expensive first
	      	@if($order_type == 3) <span class="badge">{{ count($products) }}</span> @endif
	      </a>
	      <a href="{{ route('products.order_type',4) }}" class="btn btn-outline-secondary">used only
          @if($order_type == 4) <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ route('products.order_type',5) }}" class="btn btn-outline-secondary">new only
           @if($order_type == 5) <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
		</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;">
		
	  @if(count($products))
	    @if($order_type == 1)
	           @foreach($products as $product)
	            @if(count($product->photo))
				<div id="col">
					    
						  <div class="thumbnail">
						  	<div class="thumbnail-header">
						  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
						  	</div>
						  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
							<div class="caption">
							  <h5>{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
							  <p> 
								{{  Str::limit($product->product_description,60) }}
							  </p>
							  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
							</div>
						</a>
						  </div>
						 
				</div>
				@endif
			   @endforeach
		    @elseif($order_type == 2)
	           @foreach($products as $product)
	            @if(count($product->photo))
				<div id="col">
					    
						  <div class="thumbnail">
						  	<div class="thumbnail-header">
						  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
						  	</div>
						  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
							<div class="caption">
							  <h5>{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">used</span> @endif</h5>
							  <p> 
								{{  Str::limit($product->product_description,60) }}
							  </p>
							  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
							</div>
						</a>
						  </div>
						 
				</div>
				@endif
			   @endforeach

		    @elseif($order_type == 3)
	           @foreach($products as $product)
	            @if(count($product->photo))
				<div id="col">
					    
						  <div class="thumbnail">
						  	<div class="thumbnail-header">
						  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
						  	</div>
						  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
							<div class="caption">
							  <h5>{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">used</span> @endif</h5>
							  <p> 
								{{  Str::limit($product->product_description,60) }}
							  </p>
							  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
							</div>
						</a>
						  </div>
						 
				</div>
				@endif
			   @endforeach

		    @elseif($order_type == 4)
	           @foreach($products as $product)
	            @if(count($product->photo))
				<div id="col">
					    
						  <div class="thumbnail">
						  	<div class="thumbnail-header">
						  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
						  	</div>
						  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
							<div class="caption">
							  <h5>{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">used</span> @endif</h5>
							  <p> 
								{{  Str::limit($product->product_description,60) }}
							  </p>
							  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
							</div>
						</a>
						  </div>
						 
				</div>
				@endif
			   @endforeach
		   @elseif($order_type == 5)
	           @foreach($products as $product)
	            @if(count($product->photo))
				<div id="col">
					    
						  <div class="thumbnail">
						  	<div class="thumbnail-header">
						  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
						  	</div>
						  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
							<div class="caption">
							  <h5>{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">used</span> @endif</h5>
							  <p> 
								{{  Str::limit($product->product_description,60) }}
							  </p>
							  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
							</div>
						</a>
						  </div>
						 
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
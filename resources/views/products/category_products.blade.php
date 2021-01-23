@extends('layouts.homepage')
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
	  @if(count($categories))
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->id }}/1">{{ $category->name }}</a></li>
			@endforeach
		</ul>
	  @endif
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
        <div>
        @if( count($products))	<h4 style="text-transform: capitalize;" class="text-orange text-times">{{ $products[0]->category->name }} category products <span class="badge">{{ count($products) }}</span></h4>@endif
        </div>	
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      @if($order_type == 1) <a href="{{ url('/category_products') }}/{{ $category_id }}/1" class="btn"  style="background-color: orange;">Latest</a>	
	       @else
           <a href="{{ url('/category_products') }}/{{ $category_id }}/1" class="btn">Latest</a>	
	      @endif
           @if($order_type == 2)
	       <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_id }}/2" class="btn">cheap first</a>
             @else
            <a href="{{ url('/category_products') }}/{{ $category_id }}/2" class="btn">cheap first</a>
	       @endif
          @if($order_type == 3)
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_id }}/3" class="btn">expensive first</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_id }}/3" class="btn">expensive first</a>
	      @endif

          @if($order_type == 4)
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_id }}/4" class="btn">used only</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_id }}/4" class="btn">used only</a>
	      @endif

          @if($order_type == 5)
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_id }}/5" class="btn">new only</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_id }}/5" class="btn">new only</a>
	      @endif	
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
		  <div style="padding: 2px 6px;"><h4 class="text-info">NO PRODUCTS YET</h4> </div>
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
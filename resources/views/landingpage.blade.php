@extends('layouts.homepage')
@section('all_categories')
 @include('includes.categories_section')
@endsection
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
     	@if(count($categories))
      	 <ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->slug }}/latest" >{{ $category->name }} <span style="font-size: 16px;" class="badge">{{ $category->total }}</span></a></li>
			@endforeach
		</ul>
		@endif
		<br/>
		  <div style="text-align: center;" class="thumbnail">
             <h3 class="text-times text-18 text-blue">Advertise here</h3>
		  </div><br/>
         @include('includes.sidebar')
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
	@if(count($chuoproducts) > 0)
			<div id="carousel-well" class="well well-small">
				<div class="well-head">
					<div>
					<h4><a class="text-orange" href="{{ route('customer.chuobusiness_products') }}">Laptop&smartphones Shop</a></h4>
				    </div>
				    <div id="laptops-marquee">
					<marquee>
						<h4><small class="pull-right">+{{ count($chuoproducts) }} laptop&smartphones</small></h4>
					</marquee>
				   </div>
                </div>
<!-- laptops and smartphones carousel.......................................................... -->
       <div class="laptops-carousel">
       	  @foreach($chuoproducts as $product)
            @if(count($product->image))
			<div id="fb">
				<a id="chuoproductLink" href="{{ route('item_preview',[2,$product->slug]) }}">
				<div class="img-container">
					<img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"  >
				</div>
				<div style="padding: 1px 5px 6px;background-color: white" class="chuoproduct-body bg-light-range">
					<label  class="text-times text-16">{{ Str::limit($product->product_name,24) }}</label>
					<div class="d-flex justify-content-between">
						<div>
						<label  class="text-times text-16">{{ number_format($product->product_price,0) }} Tsh</label>	
						</div>
						<div><button>view more</button></div>
					</div>
				</div>
			</a>
			</div>
			@endif
		  @endforeach

       </div>
		</div>
	@endif
<!-- end of laptops and smartphones carousel................................ -->
		<h4> <a class="text-orange" href="{{ route('customer.premium_products') }}">Premium Products</a> </h4>
<!-- row.................................................................................. -->
       <div class="main-carousel">
	
	  @if(count($premium_products))
           @foreach($premium_products as $product)
            @if(count($product->photo))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[1,$product->slug]) }}"><img src="{{ asset('images') }}/{{ $product->photo[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->slug]) }}">
						<div class="caption">
						  <h5 class="text-times">{{ Str::limit($product->product_name,26) }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
						  <p> 
							{{  Str::limit($product->product_description,60) }}
						  </p>
						  <div id="productFooter">
							  <h5>From: <span class="text-orange">{{ Str::limit($product->university->name,20) }}</span></h5>
								 <div class="btn-group">
						          <button class="btn btn-primary">{{ number_format($product->product_price) }}</button>
						          <button class="btn"><span class="text-orange">Tsh</span></button>
						         </div>
						  </div>
						</div>
					    </a>
					  </div>
					 
			</div>
			@endif
		  @endforeach

	@endif


       </div>
<!-- end of premium section .................................................... -->
      <br>
	<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ route('products.order_type','latest') }}" class="btn btn-outline-secondary">all</a>	
	      <a href="{{ route('products.order_type','cheap-first') }}" class="btn btn-outline-secondary">cheap first</a>	
	      <a href="{{ route('products.order_type','expensive-first') }}" class="btn btn-outline-secondary">expensive first</a>
	      <a href="{{ route('products.order_type','used-only') }}" class="btn btn-outline-secondary">used only</a>	
	      <a href="{{ route('products.order_type','new-only') }}" class="btn btn-outline-secondary">new only</a>	
	</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
			
	  @if(count($products))
           @foreach($products as $product)
            @if(count($product->photo))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[1,$product->slug]) }}"><img src="{{ asset('images') }}/{{ $product->photo[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->slug]) }}">
						<div class="caption">
						  <h5 class="text-times">{{ Str::limit($product->product_name,26) }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
						  <p> 
							{{  Str::limit($product->product_description,60) }}
						  </p>
						  <div id="productFooter">
							  <h5>From: <span class="text-orange">{{ Str::limit($product->university->name,20) }}</span></h5>
								 <div class="btn-group">
						          <button class="btn btn-primary">{{ number_format($product->product_price) }}</button>
						          <button class="btn"><span class="text-orange">Tsh</span></button>
						         </div>
						  </div>
						</div>
					    </a>
					  </div>
					 
			</div>
			@endif
		  @endforeach
		 @else
		  <center><h4 class="text-info">NO PRODUCTS YET</h4></center>
	@endif

		</div>

	         <div class=" mt-2">
	           {{ $products->render()}}
	         </div> 
		</div>
	</div>
@endsection 
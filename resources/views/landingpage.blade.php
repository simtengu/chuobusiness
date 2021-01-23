@extends('layouts.homepage')
@section('all_categories')
 @include('includes.categories_section')
@endsection
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
	@if(count($chuoproducts) > 0)
			<div class="well well-small">
				<div class="well-head">
					<div>
					<h4><a class="text-orange" href="smartphones.html">Laptop&smartphones Shop</a></h4>
				    </div>
				    <div id="laptops-marquee">
					<marquee>
						<h4><small class="pull-right">200+ laptop&smartphones</small></h4>
					</marquee>
				   </div>
                </div>
<!-- laptops and smartphones carousel.......................................................... -->

       <div class="laptops-carousel">
       	  @foreach($chuoproducts as $product)
            @if(count($product->image))
			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}" >
						</a>
					    </div>
					   <a id="chuoproductLink" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5 class="text-times padding-0 margin-0">{{ Str::limit($product->product_name,20) }} @if($product->period_id != null) <span class="text-orange text-16">(used)</span> @endif</h5>
						  <p class="padding-0 margin-0"> 
							{{  Str::limit($product->product_description,50) }}
						  </p>
						  <div style="text-align:center; display: inline-flex;">
						  <button class="btn btn-primary">{{ number_format($product->product_price) }}</button>
						  <button class="btn"> <span class="text-orange">Tsh</span></button>
						  </div>
						</div>
						</a>
					  </div>
			</div>
			@endif
		  @endforeach

       </div>
		</div>
	@endif
<!-- end of laptops and smartphones carousel................................ -->
		<h4> <a class="text-orange" href="premium_products.html">Premium Products</a> </h4>
<!-- row.................................................................................. -->
       <div class="main-carousel">
			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/mypc.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/aa.jfif" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/cc.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/dd.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/shoe.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/logo.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>
       </div>
<!-- end of premium section .................................................... -->
      <br>
	<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ route('products.order_type',1) }}" class="btn btn-outline-secondary">all</a>	
	      <a href="{{ route('products.order_type',2) }}" class="btn btn-outline-secondary">cheap first</a>	
	      <a href="{{ route('products.order_type',3) }}" class="btn btn-outline-secondary">expensive first</a>
	      <a href="{{ route('products.order_type',4) }}" class="btn btn-outline-secondary">used only</a>	
	      <a href="{{ route('products.order_type',5) }}" class="btn btn-outline-secondary">new only</a>	
	</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
			
	  @if(count($products))
           @foreach($products as $product)
            @if(count($product->photo))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5 class="text-times">{{ Str::limit($product->product_name,36) }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
						  <p> 
							{{  Str::limit($product->product_description,60) }}
						  </p>
						  <h5>From: <span class="text-orange">{{ Str::limit($product->university->name,20) }}</span></h5>
						  <div style="text-align:center; display: inline-flex;">
						  <button class="btn btn-primary">
						  	{{ number_format($product->product_price) }}</button>
						  <button class="btn"> <span class="text-orange">Tsh</span></button>
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
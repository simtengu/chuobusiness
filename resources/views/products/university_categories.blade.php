@extends('layouts.homepage')
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $category->slug }}/latest">{{ $category->name }} <span class="badge">{{ $category->total }}</span></a></li>
			@endforeach
		</ul>
		<br/>
	  		 <div class="d-large">
		  	 @include('includes.sidebar')
		  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">	
		  <div class="d-flex">
		  	<a style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class="text-orange text-arial" href="{{ url('/region_products') }}/{{ $university->region_id }}/latest">{{ $university->region->name }}</a><a style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class=" text-arial">\</a>
		  	<a style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class="text-orange text-arial" href="{{ url('/university_products') }}/{{ $university->id }}/latest">{{ $university->name }}</a>	
		    <label style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class="text-orange text-arial" href="#"><span style="color: black; margin-right:3px;">\</span>Category</label>
		  </div>

	<div class="region-categories-div">
		<h4 class="text-orange text-arial">
		{{ $cat->name }} Category Items
		</h4>
	</div> 

		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $cat->slug }}/latest" class="btn btn-outline-secondary">Latest @if($order_type == "latest") <span class="badge">{{ count($products) }}</span> @endif</a>
	      <a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $cat->slug }}/cheap-first" class="btn btn-outline-secondary">cheap first
           @if($order_type == "cheap-first") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $cat->slug }}/expensive-first" class="btn btn-outline-secondary">expensive first
	      	@if($order_type == "expensive-first") <span class="badge">{{ count($products) }}</span> @endif
	      </a>
	      <a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $cat->slug }}/used-only" class="btn btn-outline-secondary">used only
          @if($order_type == "used-only") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $cat->slug }}/new-only" class="btn btn-outline-secondary">new only
           @if($order_type == "new-only") <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
		</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;">
		
	  @if(count($products))
	    @if($order_type == "latest")
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
		    @elseif($order_type == "cheap-first")
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

		    @elseif($order_type == "expensive-first")
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

		    @elseif($order_type == "used-only")
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
		   @elseif($order_type == "new-only")
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
          @endif
		 @else
		  <div style="padding: 5px 3px;"><h4 class="text-info">NO PRODUCTS YET</h4> </div>
	@endif
		</div>
            @if(count($products))
	         <div class="mt-2">
	           {{ $products->render()}}
	         </div> 
	        @endif

		</div>
	</div>
@endsection
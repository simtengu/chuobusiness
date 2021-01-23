@extends('layouts.homepage')
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/university_categories') }}/{{ $university->id }}/{{ $category->id }}/1">{{ $category->name }} <span class="badge">{{ $category->total }}</span></a></li>
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
	  <div class="d-flex">
	  	<a style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class="text-orange text-arial" href="{{ url('/region_products') }}/{{ $university->region_id }}/1">{{ $university->region->name }}</a><a style="padding: 8px 8px 8px 0px; font-size: 19px; font-weight: bold; " class=" text-arial">\</a>
	  	<h4 class="text-orange text-arial" style="text-transform: capitalize;">{{ $university->name }}</h4>	
	  </div>
	<hr class="soft"/>	
	<div class="region-categories-div">
		<h4 class="text-orange text-arial">
		{{ $university->name }} Categories
		</h4>
		<div style="display: inline-flex;">
	     <form id="universityCategoriesForm" method="get" action="{{ route('university.categories') }}">
	     	@csrf
		   <input type="hidden" name="university_id" value="{{ $university->id }}">
           <input id="category_path" type="hidden" name="cat_path" value="{{ url('/university_categories') }}/{{ $university->id }}">
	     	 <div style="display: inline-flex;">
		   <select id="u_categories" name="category_id">
		   	 <option value="">select here</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }} ({{ $category->total }})</option>
			@endforeach
		   </select> 
		    <div>
		   	<button type="submit" class="btn btn-primary"><i class="icon-search" style="font-size: 18px"></i></button>
		   </div>
		   </div>
           </form>
		 </div>
		 
	</div>
		  <div class="control-group">
		    <h4 style="text-transform: capitalize;" class="text-orange text-arial">search in {{ $university->name }}</h4>
		    <form action="" method="get">
            <div class="controls">
              <div class="input-append">
                <input id="appendedInputButton" class="c-search-field" placeholder="search here" type="text" required>
                <button class="btn btn-primary" type="submit"><i class="icon-search" style="font-size: 18px"></i></button>
              </div>
            </div>
            </form>
          </div>
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      <a href="{{ url('/university_products') }}/{{ $university->id }}/1" class="btn btn-outline-secondary">Latest @if($order_type == 1) <span class="badge">{{ count($products) }}</span> @endif</a>	
	      <a href="{{ url('/university_products') }}/{{ $university->id }}/2" class="btn btn-outline-secondary">cheap first
           @if($order_type == 2) <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ url('/university_products') }}/{{ $university->id }}/3" class="btn btn-outline-secondary">expensive first
	      	@if($order_type == 3) <span class="badge">{{ count($products) }}</span> @endif
	      </a>
	      <a href="{{ url('/university_products') }}/{{ $university->id }}/4" class="btn btn-outline-secondary">used only
          @if($order_type == 4) <span class="badge">{{ count($products) }}</span> @endif
	      </a>	
	      <a href="{{ url('/university_products') }}/{{ $university->id }}/5" class="btn btn-outline-secondary">new only
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
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
  $("#u_categories").on('change',function(){
  	 var cat_id = $(this).val();
     var path =	$("#category_path").val();
     if (cat_id != "") {
    window.location.href = path+"/"+cat_id+"/1";
     }
  });

  $("#universityCategoriesForm").submit(function(e){
      var catId = $("#u_categories").val();
      if (catId == "") {
      	e.preventDefault();
      }  
  });

});

</script>
@stop
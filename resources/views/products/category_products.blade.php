@extends('layouts.homepage')
@section('content')
<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
	  @if(count($categories))
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->slug }}/latest">{{ $category->name }} <span class="badge">{{ $category->total }}</span></a></li>
			@endforeach 
		</ul>
	  @endif
		<br/>
		  <div style="text-align: center;" class="thumbnail">
             <h3 class="text-times text-18 text-blue">Advertise here</h3>
		  </div><br/>
 		  <div class="d-large">
		  	 @include('includes.sidebar')
		  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">	
        <div>
        @if( count($products))	<h4 style="text-transform: capitalize;" class="text-orange text-times">{{ $products[0]->category->name }} category products <span class="badge">{{ count($products) }}</span></h4>@endif
        </div>	
		<div id="products_filtering" style="padding: 2px 5px;" class="row">
	      @if($order_type == "latest") <a href="{{ url('/category_products') }}/{{ $category_slug }}/latest" class="btn"  style="background-color: orange;">Latest</a>	
	       @else
           <a href="{{ url('/category_products') }}/{{ $category_slug }}/latest" class="btn">Latest</a>	
	      @endif
           @if($order_type == "cheap-first")
	       <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_slug }}/cheap-first" class="btn">cheap first</a>
             @else
            <a href="{{ url('/category_products') }}/{{ $category_slug }}/cheap-first" class="btn">cheap first</a>
	       @endif
          @if($order_type == "expensive-first")
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_slug }}/expensive-first" class="btn">expensive first</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_slug }}/expensive-first" class="btn">expensive first</a>
	      @endif

          @if($order_type == "used-only")
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_slug }}/used-only" class="btn">used only</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_slug }}/used-only" class="btn">used only</a>
	      @endif

          @if($order_type == "new-only")
	      <a style="background-color: orange;" href="{{ url('/category_products') }}/{{ $category_slug }}/new-only" class="btn">new only</a>
	      @else
	       <a  href="{{ url('/category_products') }}/{{ $category_slug }}/new-only" class="btn">new only</a>
	      @endif	
		</div>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important; padding-left: 5px;">
		
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
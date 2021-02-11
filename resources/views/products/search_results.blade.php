@extends('layouts.homepage')
@section('content')
<div class="row">
  <div class="span9">
  <!-- 	search is at national level................................................ -->
  @if($level == 'nationLevel')
  @if(($chuoproducts_count + $products_count) > 0)
  <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times">Search results for: "<span style="font-weight: bold;">{{ $key }}</span>"</h4></div>
  @endif
  @if(($chuoproducts_count + $products_count) > 0)
	<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
	     @if($chuoproducts_count > 0)
           @foreach($chuoproducts as $product)
            @if(count($product->image))
			<div id="col"> 
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$product->slug]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->slug]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
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

		@if($products_count > 0)
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
    </div>
		  @else
		  <div style="padding: 4px;"><h5>No results found  for "{{ $key }}"</h5></div>
	@endif

  @elseif($level == 'regionLevel')
  @if(($chuoproducts_count + $products_count) > 0)
  <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times">Search results for: "<span style="font-weight: bold;">{{ $key }}</span>"</h4></div>
  @endif
   @if(($chuoproducts_count + $products_count) > 0)
	<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
<!-- matching chuoproducts................................................................. -->
	     @if($chuoproducts_count > 0)
           @foreach($chuoproducts as $product)
            @if(count($product->image))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$product->slug]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->slug]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
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
<!-- matching normal products................................................................. -->
		@if($products_count > 0)
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

	</div>
	 @else
		  <div style="padding: 4px;"><h5>No results found  for "{{ $key }}"</h5></div>
	@endif
<!-- end of region level section.............................................................. -->
  @elseif($level == 'universityLevel')

  @if(($chuoproducts_count + $products_count) > 0)
  <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times">Search results for: "<span style="font-weight: bold;">{{ $key }}</span>"</h4></div>
  @endif
  @if(($chuoproducts_count + $products_count) > 0)
	<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
<!--   found chuoproducts.......................................................... -->
	     @if($chuoproducts_count > 0)
           @foreach($chuoproducts as $product)
            @if(count($product->image))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$product->slug]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->slug]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
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
  <!-- found normal products................................................. -->
		@if($products_count > 0)
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
	</div>
	 @else
   <div style="padding: 4px;margin-left: 3px;"><h5>No results found  for "{{ $key }}"</h5></div>		
  @endif
<!-- end of university level section.............................................................. -->
  @elseif($level == 'college')
    @if($result_count > 0)
      <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times">Search results for: "<span style="font-weight: bold;">{{ $key }}</span>"</h4></div>
	<div id="region-universities-div"  class="padding-3" style="margin-bottom: 2px;">
		@foreach($colleges as $college)
		<a href="{{ route('university_products',[$college->id,'latest']) }}">{{ $college->name }}</a>
		@endforeach
	</div>     
     @else
       <div style="padding: 4px;margin-bottom: 3px;"><h5>No results found for "{{ $key }}"</h5></div>
    @endif
  <!-- end of college search section....................................... --> 
 @endif

	</div>
	<!-- Sidebar for advertisment  ================================================== -->
	<div id="sidebar" class="span3">
  @include('includes.sidebar')
	</div>
	<!-- Sidebar end=============================================== -->
 </div>

@endsection
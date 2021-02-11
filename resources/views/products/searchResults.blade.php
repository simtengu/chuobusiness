@extends('layouts.homepage')
@section('content')
<div class="row">
  <div class="span9">
  <!-- 	search is at national level................................................ -->
  @if($level == 'regionLevel')
  <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times text-orange">Search results..</h4></div>
<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
  @if($order == 1)
<!-- the product that user clicked from search suggestions..........	 -->

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
<!-- other items related to selected product............................................... -->
<!-- chuoproducts first............ -->
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
							{{ Str::limit($product->product_description,60) }}
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

<!-- normal products last............ -->
@if($more_related_count > 0)
           @foreach($more_related_items as $product)
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
 
@if($less_related_count > 0)
           @foreach($less_related_items as $product)
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

<!-- end of normal products found section................... -->

  @elseif($order == 2)
<!-- the product that a user selected from search results................. -->
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$chuoproduct->slug]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->slug]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,60) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
										 <div class="btn-group">
								          <button class="btn btn-primary">{{ number_format($chuoproduct->product_price) }}</button>
								          <button class="btn"><span class="text-orange">Tsh</span></button>
								         </div>
								  </div>
						</div>
					   </a>
					  </div>
			</div>
			
<!-- some other related products.......................................... -->
<!-- related chuoproducts first................... -->
  @if(count($more_chuoproducts) > 0)
          @foreach($more_chuoproducts as $product)
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
							{{ Str::limit($product->product_description,60) }}
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
<!-- related other products last................. -->
  @if(count($related_products) > 0)
           @foreach($related_products as $product)
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

  @endif
</div>

  @elseif($level == 'nationLevel')
   <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times text-orange">Search results..</h4></div>
   <div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
   	@if($order == 1)
<!-- the product that user clicked from search suggestions(normal product)..........	 -->
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

<!-- related chuoproducts first............ -->
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
							{{ Str::limit($product->product_description,60) }}
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
<!-- related normal products last............ -->
@if($more_related_count > 0)
           @foreach($more_related_items as $product)
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


   	@elseif($order == 2)
<!-- the product that a user selected from search results(chuoproduct)................. -->
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$chuoproduct->slug]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->slug]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,60) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
										 <div class="btn-group">
								          <button class="btn btn-primary">{{ number_format($chuoproduct->product_price) }}</button>
								          <button class="btn"><span class="text-orange">Tsh</span></button>
								         </div>
								  </div>
						</div>
					   </a>
					  </div>
			</div>
<!-- more related chuoproducts............................................. -->
  @if($more_related_count > 0)
          @foreach($more_related_items as $product)
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

 <!-- related other products (normal products)................. -->
  @if(count($related_normal_products) > 0)
           @foreach($related_normal_products as $product)
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


   	@endif
   </div> 
<!--   nation level paginations............................................... -->
<div class="p-3">
	@if($more_related_items)
	  	       <div class=" mt-2">
	           {{ $more_related_items->render()}}
	         </div> 
	@endif
</div>

  @elseif($level == 'universityLevel')
  <div style="padding: 4px;margin-bottom: 3px;"><h4 class="text-times text-orange">Search results..</h4></div>
<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
  @if($order == 1)
<!-- the product that user clicked from search suggestions..........	 -->

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
<!-- related chuoproducts to selected product............................... -->
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
							{{ Str::limit($product->product_description,60) }}
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
<!-- more related products....................................................
 -->

@if($more_related_count > 0)
           @foreach($more_related_items as $product)
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
 
@if($less_related_count > 0)
           @foreach($less_related_items as $product)
            @if(count($product->photo))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[1,$product->slug]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->slug]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
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

   @elseif($order == 2)
<!-- the product that a user selected from search results................. -->
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[2,$chuoproduct->slug]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->slug]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,80) }}
						  </p>
								  <div id="productFooter">
									  <h5>From: <span class="text-orange">Chuobusiness</span></h5>
										 <div class="btn-group">
								          <button class="btn btn-primary">{{ number_format($chuoproduct->product_price) }}</button>
								          <button class="btn"><span class="text-orange">Tsh</span></button>
								         </div>
								  </div>
						</div>
					   </a>
					  </div>
			</div>

<!-- related chuoproducts first................... -->
  @if(count($more_chuoproducts) > 0)
          @foreach($more_chuoproducts as $product)
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
<!-- more related normal products.......................................... -->
  @if(count($more_related_items) > 0)
           @foreach($more_related_items as $product)
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
<!-- less related normal products.......................................... -->
  @if(count($less_related_items) > 0)
           @foreach($less_related_items as $product)
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


  @endif
 </div>
   
 @endif

	</div>
	<!-- Sidebar for advertisment  ================================================== -->
	<div id="sidebar" class="span3">
       @include('includes.sidebar')
	</div>
	<!-- Sidebar end=============================================== -->
 </div>

@endsection
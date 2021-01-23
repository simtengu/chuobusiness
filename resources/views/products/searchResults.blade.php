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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$chuoproduct->id]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->id]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($chuoproduct->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$chuoproduct->id]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->id]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($chuoproduct->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$chuoproduct->id]) }}"><img src="{{ asset('pictures') }}/{{ $chuoproduct->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$chuoproduct->id]) }}">
						<div class="caption">
						  <h5>{{ $chuoproduct->product_name }}</h5>
						  <p> d
							{{ Str::limit($chuoproduct->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($chuoproduct->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[2,$product->id]) }}"><img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"></a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[2,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> d
							{{ Str::limit($product->product_description,80) }}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary" >{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  <a href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
							{{ Str::limit($product->product_description,80)}}
						  </p>
						  <h4 style="text-align:center"><button class="btn"> <i class="icon-zoom-in"></i></button><button class="btn btn-primary">{{ number_format($product->product_price) }}</button></h4>
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
          <div style="background-color: #f5f5f5" class="thumbnail">
            <!-- <img src="http://placehold.it/260x180" alt=""> -->
            <div class="caption">
              <h5>Advertisment <br> <span class="text-arial text-orange">From chuobusiness community</span></h5>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
            </div>
          </div>
	</div>
	<!-- Sidebar end=============================================== -->
 </div>

@endsection
@extends('layouts.homepage')
@section('content')

@if($type == 1)
	<div class="row">
	<!-- Sidebar ================================================== -->
		<div id="sidebar" class="span3">
			<div class="well well-small">
			<a href="{{ route('products.order_type',1) }}" style="font-size: 18px; font-weight: bold;padding: 13px 35px;" class="text-orange">>>>Back to products</a>
			</div>
		</div>
	<!-- Sidebar end=============================================== -->
		<div class="span9">
	    <ul class="breadcrumb">
	    <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span></li>
	    <li class="active">product Details</li>
	    </ul>	
	    </div>
    </div> 
	<div class="row">	
	<!-- product images section..................................................  --> 
			<div id="gallery" class="span6">
				<div class="main-product-img">
		            <a class="active_img_link" href="{{ asset('images') }}/{{ $product->photo[0]->name }}" title="Main product image" target="blank">
					 @if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif
		            </a>
				</div>
				<div style="display: flex;flex-wrap: wrap;" class="more-product-imgs">
                  @if(count($product->photo))
                  @foreach($product->photo as $photo)
					<div class="single-img">
						<img  src="{{ asset('images') }}/{{ $photo->name }}" alt="product image"/>
					</div>
                    @endforeach  
                  @endif									
				</div>
			</div>
			<div class="span6">
				<h3 class="text-orange">{{ $product->product_name  }} </h3>
			<hr class="soft"/>
            <div id="myTabContent" class="tab-content">
              <div>
				<h4>Product description</h4>
				<p class="text-dark" style="font-size: 15px; padding-left: 4px;">
				{{ $product->product_description }}<br/>
				</p>
				<div>
					<h4 style="padding: 0px; margin: 0px; font-size: 18px;">Owner Contacts</h4>
					<div style="padding: 2px 4px;">
						<span style="display: block;"> (For bargain/discount & buying)</span>
						<label style="text-transform: capitalize;" class="text-16">Name: {{ $product->user->fname }} {{ $product->user->lname }}</label>
						<label class="text-16">From: {{ $product->university->name }}, {{ $product->university->region->name }}</label>
						<a class="text-dark text-17" href="https://wa.me/255{{ substr($product->user->whatsapp_phone,1) }}" target="blank">{{ $product->user->whatsapp_phone }} <i class="icon-phone"></i></a> 
	                        
						<!-- <label>{{ $product->user->whatsapp_phone }}</label> -->
						<label class="text-16">{{ $product->user->phone_2 ?? "" }}</label>
						<label class="text-16">{{ $product->user->email }}</label>
					</div>
					<a  href="{{ route('user.shop',$product->user_id) }}"> <h5 class="text-orange text-arial text-16 ">More items from this item owner</h5></a>
				</div>
              </div>

		     </div>
			</div>

	</div>
<hr class="soft"/>
@if( ($more_related_count > 0) || ($less_related_count > 0) || ($less_related_count1 > 0) )
<h4 class="text-orange text-18 text-times d-block">Related Items</h4>	
@endif

<div class="row">
  <div class="span9">
	<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
		<!-- more related products(from the same college).................................. -->
	  @if($more_related_count > 0)
           @foreach($more_related_items as $product)
            @if(count($product->photo))
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="{{ route('item_preview',[1,$product->id]) }}">@if(count($product->photo))<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">@endif</a>
					  	</div>
					  	<a style="color: black;display: block;" href="{{ route('item_preview',[1,$product->id]) }}">
						<div class="caption">
						  <h5>{{ $product->product_name }}</h5>
						  <p> 
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
 <!-- less related products(from the same region but different college)............................................................. -->
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

 <!-- less related products1(belong to the same category but are from different region)............................................................. -->
 	  @if($less_related_count1 > 0)
           @foreach($less_related_items1 as $product)
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

	</div>

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

 @elseif($type == 2)
	<div class="row">
	<!-- Sidebar ================================================== -->
		<div id="sidebar" class="span3">
			<div class="well well-small">
			<a href="{{ route('products.order_type',1) }}" style="font-size: 16px; font-weight: bold;padding: 13px 35px;" class="text-orange">>>chuobusiness shop</a>
			</div>
		</div>
	<!-- Sidebar end=============================================== -->
		<div class="span9">
	    <ul class="breadcrumb">
	    <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span></li>
	    <li class="active">product Details</li>
	    </ul>	
	    </div>
    </div> 
	<div class="row">	
	<!-- product images section..................................................  --> 
			<div id="gallery" class="span6">
				<div class="main-product-img">
		            <a class="active_img_link" href="{{ asset('pictures') }}/{{ $product->image[0]->name }}" title="Main product image" target="blank">
					 @if(count($product->image))<img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}">@endif
		            </a>
				</div>
				<div style="display: flex;flex-wrap: wrap;" class="more-product-imgs">
                  @if(count($product->image))
                  @foreach($product->image as $photo)
					<div class="single-img">
						<img  src="{{ asset('pictures') }}/{{ $photo->name }}" alt="product image"/>
					</div>
                    @endforeach  
                  @endif									
				</div>
			</div>
			<div class="span6">
				<h3 class="text-orange">{{ $product->product_name  }} </h3>
			<hr class="soft"/>
            <div id="myTabContent" class="tab-content">
              <div>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{ $product->brand->name  }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">{{ $product->product_name ?? "---" }}</td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">RAM:</td><td class="techSpecTD2">{{ $product->product_ram  }}</td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">processor:</td><td class="techSpecTD2">{{ $product->product_processor  }}</td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">OS:</td><td class="techSpecTD2">{{ $product->os->name  }}</td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">Camera:</td><td class="techSpecTD2">{{ $product->product_camera ?? "---"  }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> {{ $product->product_release_date ?? "---"  }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">{{ $product->product_display ?? "---"  }}</td></tr>
				</tbody>
				</table>
				@if( $product->product_description )
				<h4>Product description</h4>
				<p class="text-dark" style="font-size: 15px; padding-left: 4px;">
				{{ $product->product_description }}<br/>
				</p>
			    @endif
				<div>
					<h4 style="padding: 0px; margin: 0px; font-size: 18px;">Owner Contacts</h4>
					<div style="padding: 2px 4px;">
						<span style="display: block;"> (For bargain/discount & buying)</span>
						<label class="text-16">From: <span class="text-orange">Chuobusiness shop</span></label>
						<a class="text-dark text-17" href="https://wa.me/255{{ substr(config('global.tigopayment_number'),1) }}" target="blank">{{ config('global.tigopayment_number') }}<i class="icon-phone"></i></a> 
						<label class="text-16">{{ config('global.vodapayment_number') }}</label>
						<label class="text-16">{{ $product->user->email }}</label>
					</div>
				</div>
              </div>

		     </div>
			</div>

	</div>
<hr class="soft"/>
<!-- More products from chuobusiness shop..................................... -->
@if( count($chuoproducts) > 0 )
<h4 class="text-orange text-18 text-times d-block">Related products</h4>	
@endif

<div class="row">
  <div class="span9">
	<div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start;">
	  @if(count($chuoproducts) > 0)
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
						  <p> 
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

 <!-- normal products related to specified chuoproduct............................................................. -->
 	  @if(count($products) > 0)
           @foreach($products as $product)
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

	</div>

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

@endif


@endsection
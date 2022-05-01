@extends('layouts.homepage')
@section('content')

                      @if(session()->has('product_reported'))
                      <div class="row">
                        <div class="col-12 pt-3">
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <span>{{ session('product_reported') }}</span>
                          </div>
                        </div>
                      </div>
                      @endif
@if($type == 1)
	<div class="row">
	<!-- Sidebar ================================================== -->
		<div id="sidebar" class="span3">
			<div class="well well-small">
			<a href="{{ route('products.order_type','latest') }}" style="font-size: 16px; font-weight: bold;padding: 13px 35px;" class="text-orange">>>>Back to products</a>
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
				<h3 style="margin-bottom: 0px !important" class="text-orange text-times ">{{ $product->product_name  }} </h3>
				<label style="margin: 0px 5px !important;" class="text-times text-15">Condition: @if($product->period_value )Used for {{ $product->period_value }} {{ $product->period->name }}@if($product->period_value != 1)s @endif @else Brand new  @endif </label> 
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
						<span style="margin-right: 4px;" class="text-dark text-17">{{ $product->user->whatsapp_phone }}</span>
						<a class="text-dark" href="https://wa.me/+255{{ substr($product->user->whatsapp_phone,1) }}" target="blank"><i style="font-size:24px;color: #53ff53;" class="fab fa-whatsapp"></i></a> <a style="margin-left: 5px;" href="#"><i style="font-size:20px;color: #60d8da;" class="fas fa-phone"></i></a><br>
						 
	                        
						<!-- <label>{{ $product->user->whatsapp_phone }}</label> -->
						<label class="text-16">{{ $product->user->phone_2 ?? "" }}</label>
						<label class="text-16">{{ $product->user->email }}</label>
					</div>
					<a  href="{{ route('user.shop',$product->user->email) }}"> <h5 class="text-orange text-arial text-16 "> >>>More items from this Seller</span></h5></a>
					<hr class="soft"/>
					<div style="margin-top: 10px">
						 <p style="color: #e97774" class="text-times text-15">Is this post abusive/inappropriate?</p>
						 <a style="padding: 3px;" href="{{ route('reportPost',$product->id) }}" class="btn btn-md btn-danger">Click to report it</a>
					</div>
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
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-14">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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
 <!-- less related products(from the same region but different college)............................................................. -->
 	  @if($less_related_count > 0)
           @foreach($less_related_items as $product)
            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-14">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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

 <!-- less related products1(belong to the same category but are from different region)............................................................. -->
 	  @if($less_related_count1 > 0)
           @foreach($less_related_items1 as $product)
            @if(count($product->photo))
               <div id="media_container">
               	<a href="{{ route('item_preview',[1,$product->slug]) }}" id="product_link">
	                <div id="media">
	                	<div id="media-pic">
	                   		<img src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
	                	</div>
	                	<div id="media-body">
			                <h5 class="font-weight-bold text-times text-14">{{ $product->product_name }} @if($product->period_id != null) <span class="text-orange text-times text-16">(used)</span> @endif</h5>
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

	</div>

	</div>
	<!-- Sidebar for advertisment  ================================================== -->
	<div id="sidebar" class="span3">
      @include('includes.sidebar')
	</div>
	<!-- Sidebar end=============================================== -->
 </div>

 @elseif($type == 2)
	<div class="row">
	<!-- Sidebar ================================================== -->
		<div id="sidebar" class="span3">
			<div class="well well-small">
			<a href="{{ route('customer.chuobusiness_products') }}" style="font-size: 16px; font-weight: bold;padding: 13px 35px;" class="text-orange">>>chuobusiness shop</a>
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
			<div style="margin-top: 4px;" id="fb">
				<a id="chuoproductLink" href="{{ route('item_preview',[2,$product->slug]) }}">
				<div class="img-container">
					<img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"  >
				</div>
				<div style=" padding: 1px 5px 4px;" class="chuoproduct-body bg-light-range">
					<label  class="text-times text-16">{{ Str::limit($product->product_name,26) }}</label>
					<div  class="d-flex justify-content-between">
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
		
	@endif
 </div>
 <!-- normal products related to specified chuoproduct............................................................. -->
 <div class="row" style="display: flex;flex-wrap: wrap !important;justify-content: start; margin-top: 4px">
 	  @if(count($products) > 0)
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

	</div>

	</div>
	<!-- Sidebar for advertisment  ================================================== -->
	<div id="sidebar" class="span3">
      @include('includes.sidebar')
	</div>
	<!-- Sidebar end=============================================== -->
 </div>

@endif

@endsection
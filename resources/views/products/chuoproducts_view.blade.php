 @extends('layouts.homepage')
@section('content')
<div class="row">
		<div class="span9">		
		<div style="padding: 2px 5px;margin-bottom: 3px;" class="row">
         <h3 class="text-orange text-times">Chuobusiness Products</h3>
		</div>
	<div style="padding: 2px 5px;" class="row">
	      <button id="all-btn" class="btn btn-outline-secondary">All</button>	
	      <button id="laptops-btn" class="btn btn-outline-secondary">Computers</button>	
	      <button id="phones-btn" class="btn btn-outline-secondary">Phones</button>	  
	</div>
		
<div id="laptops_row">
		<div style="padding: 2px 5px;margin-bottom: 2px;" class="row">
         <h5 class="text-times">Our computers</h5>
		</div>
		<div  class="row" style="display: flex;flex-wrap: wrap !important;">
		
	     @if(count($laptops))

             @foreach($laptops as $product)
	            @if(count($product->image))
				<div id="fb">
					<a id="chuoproductLink" href="{{ route('item_preview',[2,$product->slug]) }}">
					<div  class="img-container">
						<img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"  >
					</div>
					<div style=" padding: 1px 5px 4px;background-color: white;" class="chuoproduct-body bg-light-range">
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


		 @else
		  <h4 style="margin-left: 5px;" class="text-info text-times">Our computer stock is over,,next one will arrive soon...you are welcome</h4> 
	     @endif
		</div>	
</div>


<div id="phones_row">
		<div style="padding: 2px 5px;margin-bottom: 2px;" class="row">
         <h5 class="text-times">Our mobile phones</h5>
		</div>
		<div  class="row" style="display: flex;flex-wrap: wrap !important;">
		
	     @if(count($phones))

             @foreach($phones as $product) 
	            @if(count($product->image))
				<div style="margin-top: 4px;" id="fb">
					<a id="chuoproductLink" href="{{ route('item_preview',[2,$product->slug]) }}">
					<div  class="img-container">
						<img src="{{ asset('pictures') }}/{{ $product->image[0]->name }}"  >
					</div>
					<div style=" padding: 1px 5px 4px;background-color: white;" class="chuoproduct-body bg-light-range">
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


		 @else
		  <h4 style="margin-left: 5px;" class="text-info text-times">Our phone stock is over,,next one will arrive soon...you are welcome</h4> 
	     @endif
		</div>	
</div>

		</div>
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
  @include('includes.sidebar')
	</div>
<!-- Sidebar end=============================================== -->
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
 $(document).ready(function(){
     $("#all-btn").click(function(){
       $("#phones_row").show();
       $("#laptops_row").show();
     });    

     $("#phones-btn").click(function(){
       $("#phones_row").show();
       $("#laptops_row").hide();
     });
     $("#laptops-btn").click(function(){
       $("#phones_row").hide();
       $("#laptops_row").show();
     });
 });
</script>

@endsection
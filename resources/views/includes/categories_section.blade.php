
<!-- product,university,categories and computer&phone section.............. -->
<!-- product categories modal section..................................... -->
	<div id="all-categories">
      <div id="sidebar">
      	<div id="categories-header" class="d-flex justify-content-between">
      		<div>
      			<span style="color: white;text-transform: capitalize;font-size: 20px;font-family: arial-narrow;margin-left: 4px;"> product categories
      			</span>
      		</div>
      		<div>
      			<button class="sidebar-close-btn ">x</button>
      		</div> 
      	</div>
      	@if(count($categories))
      	 <ul id="sideManuu" class="nav nav-tabs nav-stacked">
			@foreach($categories as $category)
			<li><a href="{{ url('/category_products') }}/{{ $category->slug }}/latest">{{ $category->name }} <span style="color: #0069c2;font-size: 16px;" class="badge">{{ $category->total }}</span></a></li>
			@endforeach
		</ul>
		@endif
      </div>
	</div>
<!-- end of all categories modal section.................................. -->
<div id="all-categories-mother-container" style="background:  linear-gradient(#0075df,#005b9f);">
	<div id="all-categories-btn-container">
		<div style="height: 30px;" class="form">
			
			<form method="get" action="" style=" background-color: #ffffff;padding: 3px; border-radius: 4px;">
				@csrf
				<div>
					<input class="a-search-field" id="search-field" style="border: none;border-radius: none;margin: 0px 
					!important;" type="text" name="product_name" required placeholder="search a product here">	
					<button type="submit" style="font-size: 20px;background-color: #ffffff;border: none; " ><i style="margin: 4px 0px;" class="icon-search"></i></button>
				</div>
			</form>
		
		</div>

		<div id="cat-form" class="form">
			<button id="all-categories-btn" class="btn padding-3">Product Categories</button>
		</div>

		<div style="position: relative;" class="form">
			<button id="cat-form-button" class="btn padding-3 uv-search-open-btn ">My University</button>
<!-- university search div .............................................-->	
 
		<div id="uv-search-body">
	      	<div id="uv-search-header">
	      		<div class=" d-block w-100">
	      			<button style="background-color: inherit;border: none;font-size: 20px;" class="uv-search-close-btn pull-right">x</button>
	      		</div>
	      		<div class="d-block w-100">
	      			<span style="color: #f89406; text-transform: capitalize;font-size: 18px;font-family: arial-narrow;margin-left: 4px;"> Find your university/College</span>
	      		</div>
	      	</div>	
	      	<div id="uvSearchByName" class="">
	      		<div class="p-3">
	      		 <div class="searchByNameFormDiv">
					<form method="get" action="" id="university-search-form">
						<div class="d-flex">
							<input class="college-search-field" style="border: none;border-radius: none;margin: 0px;" type="text" name="product_name" placeholder="Enter university name" required>	
							<button type="submit" style="font-size: 20px;background-color: #ffffff;border: none; " ><i style="margin: 4px 0px;" class="icon-search"></i></button>
						</div>
					</form>
	      		 </div>		
	      		</div>
	      	</div>
	      	<div id="uvSearchByRegion" class="">
	      		<div class="p-3">
	      		 <div><span style="color: #f89406;" >Find by region</span></div>
	      		 <div>
					<form id="regions_items_form" method="get" action="{{ route('region.products') }}" class="form-inline navbar-search" >
				 			@csrf
						<div style="display: inline-flex;">
						  	<select id="regions_items" class="regions-select" name="region_id">
				      		<option value="">Select Region name</option>
					 		@if(count($regions))
					 		   @foreach($regions as $region)
					 		    <option value="{{ $region->id }}">{{ $region->name }} ({{ $region->products_count }})</option>
					 		   @endforeach
					 		 @endif
						 </select> 
						  <button type="submit" id="" class="btn"><i class="icon-search" style="font-size: 18px"></i></button>
			            </div>
			       </form>
	      		 </div>		
	      		</div>
	      	</div>

		</div>
	
	<!-- end of university search div....................................... -->

		</div>

		<div class="form">
			 <a href="{{  route('customer.chuobusiness_products') }}"><button id="cat-form-button"  class="btn padding-3 "> Our laptop&smartphone shop</button></a>
		</div>
	</div>
</div>
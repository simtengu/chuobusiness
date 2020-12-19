@extends('layouts.homepage')
@section('all_categories')
 @include('includes.categories_section')
@endsection
@section('content')
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!-- <div style="margin-bottom: 6px;"><button class="btn btn-block btn-warning padding-3">Make your product Premium</button></div> -->
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS [230]</a>
			</li>
			<li class="subMenu"><a> CLOTHES [840] </a>
			</li>
			<li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
			</li>
			<li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
			<li><a href="products.html">SPORTS & LEISURE [58]</a></li>
			<li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
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
			<div class="well well-small">
				<div class="well-head">
					<div>
					<h4><a class="text-orange" href="smartphones.html">Laptop&smartphones Shop</a></h4>
				    </div>
				    <div id="laptops-marquee">
					<marquee>
						<h4><small class="pull-right">200+ laptop&smartphones</small></h4>
					</marquee>
				   </div>
                </div>
<!-- laptops and smartphones carousel.......................................................... -->

       <div class="laptops-carousel">
			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/mypc.jpg ') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/aa.jfif') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/cc.jpg') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/dd.jpg') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/shoe.jpg') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="{{ asset('themes/images/products/logo.jpg') }}" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>
       </div>




<!-- end of laptops and smartphones carousel................................ -->




		</div>
		<h4> <a class="text-orange" href="premium_products.html">Premium Products</a> </h4>
<!-- row.................................................................................. -->
       <div class="main-carousel">
			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/mypc.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/aa.jfif" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/cc.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/dd.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/shoe.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div class="carousel-cell">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/logo.jpg" alt=""/>
						</a>
					    </div>
						<div class="caption">
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <p class="padding-0 margin-0"> 
							Lorem Ipsum is simply dummy text for holding empty. 
						  </p>
						  <h5 class="padding-0 margin-0">Manicure &amp; Pedicure</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>
       </div>
<!-- end of premium section .................................................... -->


      <br>
    <div >
	<h4 class="text-orange"> Latest products</h4>
	<form class="form-horizontal span6">
        <label>Sort By </label>
		<div id="sortby-div" class="d-flex">
			<div class="control-group">
				<select>
	              <option>Priduct name A - Z</option>
	              <option>Priduct name Z - A</option>
	              <option>Priduct Stoke</option>
	              <option>Price Lowest first</option>
	            </select>
			</div>
			<div class="control-group">
				<div style="display: inline-flex;">
					<select>
		              <option>Priduct name A - Z</option>
		              <option>Priduct name Z - A</option>
		              <option>Priduct Stoke</option>
		              <option>Price Lowest first</option>
		            </select>
		            <button class="btn btn-primary">ok</button>	
				</div>
			</div>	
		</div>
	  </form>
	</div>
		<br class="clr"/>
		<div id="latest-products-row" class="row" style="display: flex;flex-wrap: wrap !important;justify-content: space-around;">
			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
					  		<a href="product_details.html"><img src="themes/images/products/shcar3.jpg" alt="img"/></a>
					  	</div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a><a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/mypc.jpg" alt=""/></a>
					    </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
						  	<a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/logo.jpg" alt=""/></a>
					   </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> 
						  <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/shoe.jpg" alt=""/></a>
					   </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> 
						  <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/cc.jpg" alt=""/></a>
					   </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> 
						  <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/mypc.jpg" alt=""/></a>
					  </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>  <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/aa.jpg" alt=""/></a>
					  </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

			<div id="col">
					  <div class="thumbnail">
					  	<div class="thumbnail-header">
						<a href="product_details.html"><img src="themes/images/products/shcar3.jpg" alt=""/></a>
				       </div>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>  <a class="btn btn-primary" href="#">&euro;110.00</a></h4>
						</div>
					  </div>
			</div>

		</div>


		</div>
@endsection
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chuobusiness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="{{ asset('themes/bootshop/bootstrap.min.css') }}" media="screen"/> 
    <link href="{{ asset('themes/css/base.css') }}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('themes/css/flickity.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{ asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('themes/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('themes/css/all.css') }}" rel="stylesheet">
<style type="text/css">

.brown-color {
  color: #f8694a;
}
  

#all-categories {
	position: fixed;
	top: 0px;
	left: 0px;
	min-width: 100vw;
	height: 100vh;
	background-color: rgba(0,0,0,0.8);
	z-index: 100;
	display: none;
	
}

#all-categories-mother-container {
  padding:15px 2px;
}

#loginDiv {
	position: fixed;
	top: 0px;
	left: 0px;
	min-width: 100vw;
	height: 100vh;
	background-color: rgba(0,0,0,0.8);
	z-index: 100;
	display: none;
}



	</style>
  </head>
<body>
<!-- hidden search engines container.................................................................. -->
<div id="searchEnginesContainer">
 <div style="	display: flex;	
	justify-content: center;flex-wrap: wrap; width: 100%;height: 100%;">
	<div class="searchContainer">
			<div id="searchFormsDiv" style="margin-top: 10px; display: flex; justify-content: space-between;">
				<div> 
					<button style="padding: 8px 15px;"  id="searchEngine_close_btn" class="btn btn-primary">X</button>
				</div>
<!-- nationlevel item search form............................................................ -->
			<form style="display: none;" class="a-search-form" action="{{ route('itemSearch') }}  " method="get">
				@csrf
				<input type="hidden" id="a-search-path" name="a-search-path" value="{{ url('/item-search/nationLevel') }}">
				<input type="hidden" name="level" value="nationLevel">
				  <div style="position: relative;" class="control-group">
		            <div id="a-controls" class="controls">
		              <div class="input-append" >
		                <input name="key" type="text" placeholder="search item here"><button style="padding: 8px 15px;" class="btn btn-primary" type="submit"><i style="font-size: 20px;" class="icon-search"></i></button>
		              </div>
		            </div>
		             <div style="position: absolute; left: 0px;width: 100%;" id="a-search-suggestions">
		             </div>

		          </div>
		         
			</form>	
<!-- user university search form........................................................... -->
			<form style="display: none;" class="university-search-form" action="{{ route('itemSearch') }}" method="get">
				@csrf
				<input type="hidden" id="university-search-path" name="university-search-path" value="{{ url('/item-search/college') }}">
				<input type="hidden" name="level" value="college">
				  <div style="position: relative;" class="control-group">
		            <div id="college-controls" class="controls">
		              <div class="input-append" >
		                <input name="key" type="text" placeholder="search university/college here"><button style="padding: 8px 15px;" class="btn btn-primary" type="submit"><i style="font-size: 20px;" class="icon-search"></i></button>
		              </div>
		            </div>
		             <div style="position: absolute; left: 0px;width: 100%;" id="college-search-suggestions">
		             </div>

		          </div>
		         
			</form>	
<!-- item search in region level........................................................... -->
	@isset($region)
			<form style="display: none;" class="b-search-form" action="{{ route('itemSearch') }}" method="get">
				@csrf
			
				<input type="hidden" id="b-search-path" name="b-search-path" value="{{ url('/itemSearch/regionLevel') }}/{{ $region->id }}">
				
				<input type="hidden" name="level" value="regionLevel">
				<input type="hidden" name="region_id" value="{{ $region->id }}">
				  <div style="position: relative;" class="control-group">
		            <div id="college-controls" class="controls">
		              <div class="input-append" >
		                <input name="key" type="text" placeholder="search item here"><button style="padding: 8px 15px;" class="btn btn-primary" type="submit"><i style="font-size: 20px;" class="icon-search"></i></button>
		              </div>
		            </div>
		             <div style="position: absolute; left: 0px;width: 100%;" id="b-search-suggestions">
		             </div>

		          </div>
		         
			</form>	
     @endisset

<!-- item search in university level........................................................... -->
	@isset($university)
			<form style="display: none;" class="c-search-form" action="{{ route('itemSearch') }}" method="get">
				@csrf
			
				<input type="hidden" id="c-search-path" name="c-search-path" value="{{ url('/itemSearch/universityLevel') }}/{{ $university->id }}">
				
				<input type="hidden" name="level" value="universityLevel">
				<input type="hidden" name="university_id" value="{{ $university->id }}">
				  <div style="position: relative;" class="control-group">
		            <div id="college-controls" class="controls">
		              <div class="input-append" >
		                <input name="key" type="text" placeholder="search item here" ><button style="padding: 8px 15px;" class="btn btn-primary" type="submit"><i style="font-size: 20px;" class="icon-search"></i></button>
		              </div>
		            </div>
		             <div style="position: absolute; left: 0px;width: 100%;" id="c-search-suggestions">
		             </div>

		          </div>
		         
			</form>	
     @endisset

			</div>
	</div>


  </div>
</div>


<!-- end of search engines  container................................................................. -->
<div id="header">
	
	              @if(Session()->has('registration_session'))
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">??</button>
                             <p>{{ Session('registration_session') }}</p>
						</div>
				  @endif

	              @if(Session()->has('password_updated'))
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">??</button>
                             <p>{{ Session('password_updated') }}</p>
						</div>
				  @endif

	              @if(Session()->has('account_activated'))
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">??</button>
                             <p>{{ Session('account_activated') }}</p>
						</div>
				  @endif

<div style="padding: 0px !important;" class="container-fluid">
<div id="welcomeLine" class="row">
	<div class="span6">&nbsp; Welcome to<strong class="hidden-xs"> chuobusiness</strong></div>
	<div class="span6 hidden-phone">
	<div class="pull-right">
		<span><i class="icon-phone"></i> &nbsp; 0710162838</span>
		<span >&nbsp; 0710162838</span>
		<span >&nbsp; albertsimtengu@gmail.com</span>
		<span >&nbsp; chuobusiness@gmail.com</span>
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->

<div  class="mynav ">
	<div id="nav_flex_container">
		  <div class="f-item1">
		  	<div class="pull-right">
		  		<a id="logo-link"   style="padding-right: 34px; font-family: arial-narrow; font-weight: bold;" href="{{ route('home') }}"><span style="font-size: 36px;margin: 0px !important;" class=" brown-color">Chuo<span style="color: #0069cc">business</span></span>
		        </a>
		    </div>
		    <div id="toggler1">
				<a id="linksToggler1" href="#" >
					<img src="{{ asset('themes/images') }}/toggler4.png">
				</a>
		    </div>	
		  </div>

		    <div class="f-item2">
		       	  <div>
					<form id="topUniversitiesForm" style="margin: 0px !important;" class="form-inline" method="get" action="{{ route('university.products') }}" >
						@csrf 
						<input type="hidden" value="{{ url('/university_products') }}" name="university_products_path" id="university_path">

										 <div class="btn-group">
											  <select id="top_universities" name="top_universities" class="srchTxt">
												<option value="">Top Universities' Products</option>
											@if(count($universities))
											  @foreach($universities as $university)
												<option value="{{ $university->university_id }}">{{ $university->university->name }} ({{ $university->university_count }}) </option>
											  @endforeach
											@endif
											 </select> 
								             <button type="submit" id="submitButton" class="btn btn-primary"><i class="icon-search" style="font-size: 18px"></i></button>
								         </div>

			           </form>
			       </div> 
		
		    </div>
		    <div class="f-item3">
			    <ul id="linksMenu" class="pull-right">
				 <li style="position: relative;"><a class="navlink" id="regionsLink" href="#">Regions</a>
				 	<div id="regionsDiv" class="bg-logo">
				 		<div style="padding-bottom: 30px;">
				 			<button id="regions_close_btn" class="pull-right" style="background-color: inherit;border: none; padding: 10px">X</button>
				 		</div>
				 		<form id="rProductsForm" method="get" action="{{ route('region.products') }}">
				 			@csrf
				 		<input type="hidden" value="{{ url('/region_products') }}" name="region_products_path" id="regions_path"> 
					 	<select id="regions_products" name="region_id">
					 		<option selected="selected" value="">Select Region</option>
					 		@if(count($regions))
					 		   @foreach($regions as $region)
					 		    <option value="{{ $region->id }}">{{ $region->name }} ({{ $region->products_count }})</option>
					 		   @endforeach
					 		 @endif
					 	</select>
					 	<button class="btn btn-block btn-primary">Submit</button>
					 	</form>	
				 	</div>
				 </li>
				 @auth
				   @if(Auth::user()->isSuperAdmin())
				   <li><a class="navlink" href="{{ route('dashboard',12) }}">Admin</a></li>
				   @endif
				 @endauth
				 <li><a class="navlink" href="{{ route('contact_us') }}">Contact Us</a></li>
				 @if(!Auth::check())
				 <li><a class="navlink" href="{{ route('user.create') }}">Register</a></li>
				 @endif				 
				 <li style="position: relative;" id="lg">
			     @if(Auth::check())
			        <a id="profile-link" href="#" role="button" class="navlink"><i class="icon-user profile-link"></i>Profile</a>
			           <div id="profile-container" class="d-none">
			               <div id="logout-profile-div" class="d-flex flex-column bg-logo">
			               	 <div style="border-bottom: 1px solid #a55316" id="flex-item">
			               	 	<a href="{{ route('user.index') }}">My account</a>
			               	 </div>
			               	 <div id="flex-item">
			                  <a href="{{ route('signout') }}"
			                     onclick="event.preventDefault();
			                    document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out mr-1"></span>logout </a>  
			                  <form class="d-none" id="logout-form" method="POST" action="{{ route('signout') }}">
			                    @csrf 
			                  </form> 	
			               	 </div>
			               </div>
			           </div>

			      @else
				 <a id="loginBtn" href="#" class="navlink"><span class="navlink-login">Login</span></a>
					<div id="loginDiv">
						<div class="modal">
						  <div class="modal-header">
							<button id="loginCloseBtn" style="color: black !important; font-size: 29px;background-color: inherit;border: none;" type="button" class="pull-right" >x</button>
							<h3 style="text-transform: uppercase;" class="text-orange">Login here</h3>
						  </div>
						  <div class="modal-body">
							<form action="{{ route('login') }}" method="POST" id="login_form" class="form-horizontal loginFrm">
								@csrf 
								<input type="hidden" name="login_url" value="{{ route('login') }}">
							  <div class="control-group">								
								<input name="email" type="email" id="inputEmail" placeholder="Email" required="required">
							  </div>
							  <div class="control-group">
								<input name="password" type="password" id="inputPassword" placeholder="Password" required="required">
							  </div>
							  <div class="control-group">
								<label  class="checkbox">
								<input name="remember_me" type="checkbox" value="checked" checked> Remember me
								</label>
							  </div>
							   <p id="pwd_check" class="text-danger d-none"></p>
							<div id="forgotPwdFlex">
							  <div>
								<button type="submit" class="btn btn-success">Sign in</button>
								<button class="btn" type="button" id="CloseBtn">Close</button>
							  </div>
							  <div>
							  	<a style="padding: 5px;" class="text-blue" href="{{ route('reset_password') }}">Forget password?</a>
							  	<a style="padding: 5px;" class="text-blue" href="{{ route('user.create') }}">Create Account</a>
							  </div>
							</div>
							</form>	
						   </div>
						</div>
				    </div>
				    @endif
				  </li>
			    </ul>
		    </div>
	</div>
</div>
</div>
</div>
<!-- Header 
	End====================================================================== -->
	@yield('all_categories')

<div id="mainBody" style="min-height: 45vh;">
	<div class="container">
       @yield('content')
	</div>
</div>
<!-- window preloader div............................................ -->
  <div id="document-loader-div">
  	<div id="loader-img">
  	<img src="{{ asset('themes/images/ajaxloader3.gif') }}">
  	</div>
  </div>
<!-- footer.................................... -->
  @include('includes.footer')
<!-- scripts -->
	<script src="{{ asset('themes/js/jquery.js') }}" type="text/javascript"></script>
	<script src="{{ asset('themes/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<!-- <script src="{{ asset('themes/js/google-code-prettify/prettify.js') }}"></script> -->	
	<script src="{{ asset('themes/js/bootshop.js') }}"></script>
	<script src="{{ asset('themes/js/flickity.min.js') }}"></script>
   @yield('scripts')
</body>
</html>
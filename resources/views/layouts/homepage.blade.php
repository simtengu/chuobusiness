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
    <link href="{{ asset('themes/css/aos.css') }}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('themes/css/flickity.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{ asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('themes/css/font-awesome.css') }}" rel="stylesheet">

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
<div id="header">

	              @if(Session()->has('registration_session'))
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
                             <p>{{ Session('registration_session') }}</p>
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
					<img src="themes/images/toggler4.png">
				</a>
		    </div>	
		  </div>

		    <div class="f-item2">
		       	  <div>
					<form style="margin: 0px !important;" class="form-inline" method="post" action="products.html" >
						<div style="display: inline-flex;">
						  <select class="srchTxt">
							<option>Top Universities' Products</option>
							<option>UDOM </option>
							<option>UDSM</option>
							<option>MUHAS</option>
							<option>MUST</option>
							<option>DIT</option>
							<option>KCMC</option>
							<option>ST JOHN</option>
							<option>ST JOSEPH</option>
							<option>ARDHI DAR ES SALAAM</option>
							<option>BUGANDO</option>
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
				 		<form method="post" action="region_products.html">
					 	<select>
					 		<option selected="selected">Select Region</option>
					 		<option>Arusha</option>
					 		<option>Tabora</option>
					 		<option>Mwanza</option>
					 		<option>kilimanjaro</option>
					 		<option>Pwani</option>
					 		<option>Rukwa</option>
					 		<option>Ruvuma</option>
					 		<option>Tanga</option>
					 	</select>
					 	<button class="btn btn-block btn-primary">Submit</button>
					 	</form>	
				 	</div>
				 </li>
				 <li><a class="navlink" href="{{ route('contact_us') }}">Contact Us</a></li>
				 @if(!Auth::check())
				 <li><a class="navlink" href="{{ route('user.create') }}">Register</a></li>
				 @endif				 
				 <li style="position: relative;" id="lg">
			     @if(Auth::check())
			        <a id="profile-link" href="#" role="button" class="navlink">Profile</a>
			           <div id="profile-container" class="d-none">
			               <div id="logout-profile-div" class="d-flex flex-column bg-logo">
			               	 <div style="border-bottom: 1px solid #a55316" id="flex-item">
			               	 	<a href="#">My account</a>
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
							  	<a style="padding: 5px;" class="text-blue" href="#">Forgot password?</a>
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

<div id="mainBody">
	<div class="container">
	 <div class="row">
       @yield('content')
	 </div>
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
	<script src="{{ asset('themes/js/base.js') }}"></script>
	<script src="{{ asset('themes/js/flickity.min.js') }}"></script>
   @yield('scripts')
</body>
</html>
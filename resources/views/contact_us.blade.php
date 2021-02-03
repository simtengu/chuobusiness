@extends('layouts.homepage')
@section('content')
@if(session()->has('college_submitted'))
   <div class="container">
   <div class="alert alert-block alert-success fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{ session('college_submitted') }}</p>
	</div>
   </div>
@endif
@if(session()->has('message_submitted'))
   <div class="container">
   <div class="alert alert-block alert-success fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{ session('message_submitted') }}</p>
	</div>
   </div>
@endif
    <div class="row">
		<div class="span4">
	     <div class="padding-3">
			<h4 style="font-family: Arial-Narrow;">Contact Details</h4>
			<p>	Mianzini Street,<br/> Nearby Namanga/Moshi Junction <br> ARUSHA, TANZANIA
				<br/><br/>
				info@chuobusiness.com<br/>
				<span><i class="icon-phone"></i> &nbsp; 0710162838</span><br/>
				<span ><i class="icon-phone"></i> &nbsp; 0769873401</span><br/>
				<span >chuobusiness@gmail.com</span><br/>
				<span >albertsimtengu@gmail.com</span><br/>
				web:chuobusiness.com
			</p>

			<h4 style="font-family: Arial-Narrow;">Social Media</h4>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>	
	     </div>		
		</div>
			
		<div class="span4">
		 <div class="padding-3" >
			  		<h4 style="font-family: Arial-Narrow;" >For reporting unfound universites</h4>
					<form method="POST" action="{{ route('collegeRequestStore') }}">
					   @csrf
			        <fieldset>
			          <div class="control-group">
					  @auth
			              <input name="name" value=" {{ Auth::user()->fname ?? '' }} {{ Auth::user()->lname ?? '' }}"   type="text" placeholder="enter name" class="input-xlarge input-padding"  required>
			           @else
					   <input name="name"   type="text"  class="input-xlarge input-padding" placeholder="enter name"  required>
					 @endauth

					</div>
					   <div class="control-group">
					    @auth
			              <input value=" {{ Auth::user()->email ?? '' }}" name="email" type="email" placeholder="enter email" class="input-xlarge input-padding" required>
			              @else
						  <input  name="email" type="email" placeholder="enter email" class="input-xlarge input-padding" required>
						@endauth
					  </div>
			          <div class="control-group">
			          	<label>University/College's Name</label>
			               <input  name="college" type="text" placeholder="University/college's name" class="input-xlarge input-padding" required>
			          </div>
					   <div class="control-group">
			             <label>University/College's Region</label>
						  <select  class="input-xlarge" name="region" required>
						  	<option>Select region</option>
							  @foreach($Regions as $region)
                               <option value="{{ $region->name }}">{{ $region->name }}</option>
                              @endforeach
						  
						  </select>
			          
			          </div>

			            <button class="btn btn-large btn-warning" type="submit">Submit</button>

			        </fieldset>
			      </form>
				  @if($errors->any())
				         <div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
	                          <ul style="list-style: none;">
	                             @foreach($errors->all() as $error)
	                               <li style="color: red">{{ $error }}</li>
	                             @endforeach             
	                          </ul>
						</div>
				  @endif
		 </div>
		</div>
		<div class="span4">
				<div class="padding-3">
			  		<h4 style="font-family: Arial-Narrow;">Email Us</h4>
					  <form method="POST" action="{{ route('messageStore') }}">
					  @csrf
			        <fieldset>
			          <div class="control-group">
			            @auth
			              <input name="name" value=" {{ Auth::user()->fname ?? '' }} {{ Auth::user()->lname ?? '' }}"  type="text" placeholder="name" class="input-xlarge input-padding" required>
			             @else
						 <input name="name"  type="text" placeholder="name" class="input-xlarge input-padding" required>
					    @endauth
			          </div>
					   <div class="control-group">
			             @auth
			              <input name="email" type="text" placeholder="email" class="input-xlarge input-padding" value=" {{ Auth::user()->email ?? '' }}" required>
			               @else
                           <input name="email" type="text" placeholder="email" class="input-xlarge input-padding" required>
						 @endauth
			          </div>
					   <div class="control-group">
					   @auth
			              <input name="phone"  type="text" placeholder="phone number" class="input-xlarge input-padding" value=" {{ Auth::user()->whatsapp_phone ?? '' }}" required>
			             @else
						 <input name="phone"  type="text" placeholder="phone number" class="input-xlarge input-padding" required>
					   @endauth
					  </div>
			          <div class="control-group">
			              <textarea name="body" rows="3" id="textarea" class="input-xlarge" placeholder="type your message here" required></textarea>
			          </div>
			            <button class="btn btn-large btn-warning" type="submit">Send Message</button>
			        </fieldset>
			      </form>	
				  @if($errors->any())
				         <div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
	                          <ul style="list-style: none;">
	                             @foreach($errors->all() as $error)
	                               <li style="color: red">{{ $error }}</li>
	                             @endforeach             
	                          </ul>
						</div>
				  @endif
				</div>
		</div>
	 </div>
@stop
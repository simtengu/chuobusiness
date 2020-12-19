@extends('layouts.homepage')
@section('content')
		<div class="span4">
	     <div class="padding-3">
			<h4>Contact Details</h4>
			<p>	Mianzini Street,<br/> Nearby Namanga/Moshi Junction <br> ARUSHA, TANZANIA
				<br/><br/>
				info@chuobusiness.com<br/>
				<span><i class="icon-phone"></i> &nbsp; 0710162838</span><br/>
				<span ><i class="icon-phone"></i> &nbsp; 0769873401</span><br/>
				<span >chuobusiness@gmail.com</span><br/>
				<span >albertsimtengu@gmail.com</span><br/>
				web:chuobusiness.com
			</p>

			<h4>Social Media</h4>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>	
	     </div>		
		</div>
			
		<div class="span4">
		 <div class="padding-3" >
			  		<h4>For reporting unfound universites</h4>
					<form class="form-horizontal">
			        <fieldset>
			          <div class="control-group">
			           
			              <input  type="text" placeholder="name" class="input-xlarge input-padding" >
			           
			          </div>
					   <div class="control-group">
			              <input type="text" placeholder="email" class="input-xlarge input-padding" >
			          </div>

			          <div class="control-group">
			          	<label>University/College's Name</label>
			               <input  type="text" placeholder="University/college's name" class="input-xlarge input-padding" >
			           
			          </div>
					   <div class="control-group">
			             <label>University/College's Region</label>
						  <select  class="input-xlarge" name="region_id">
						  	<option>Select region</option>
						  	<option>Dar es salaam</option>
						  	<option>katavi</option>
						  	<option>singida</option>
						  	<option>Iringa</option>
						  	<option>mwanza</option>
						  	<option>morogoro</option>
						  	<option>Arusha</option>
						  	<option>Manyara</option>
						  </select>
			          
			          </div>

			            <button class="btn btn-large btn-warning" type="submit">Submit</button>

			        </fieldset>
			      </form>
		 </div>
		</div>
		<div class="span4">
				<div class="padding-3">
			  		<h4>Email Us</h4>
					<form class="form-horizontal">
			        <fieldset>
			          <div class="control-group">
			           
			              <input  type="text" placeholder="name" class="input-xlarge input-padding" >
			           
			          </div>
					   <div class="control-group">
			           
			              <input type="text" placeholder="email" class="input-xlarge input-padding">
			           
			          </div>
					   <div class="control-group">
			           
			              <input type="text" placeholder="phone number" class="input-xlarge input-padding" >
			          
			          </div>
			          <div class="control-group">
			              <textarea rows="3" id="textarea" class="input-xlarge" placeholder="type your message here"></textarea>
			           
			          </div>

			            <button class="btn btn-large btn-warning" type="submit">Send Message</button>

			        </fieldset>
			      </form>	
				</div>
		</div>
@stop
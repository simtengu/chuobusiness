@extends('layouts.homepage')
@section('content')
 <div class="d-flex" style="justify-content: center;">

		<div class="span6" style="min-height:900px">
		   <div class="well">
			<h4>Reset your password</h4><br/>
	              @if(Session()->has('no_user'))
						<div class="alert alert-block alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
                             <p>{{ Session('no_user') }}</p>
						</div>
				  @endif
			
			<p>Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p><br/><br/><br/>
			<form method="GET" action="{{ route('password_reset_link') }}">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">E-mail address</label>
				<div class="controls">
				  <input name="email" class="span3"  type="email" placeholder="Enter email" required>
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn block">Submit</button>
			  </div>
			</form>
		  </div>
		</div>
</div>
@stop

@extends('layouts.homepage')
@section('content')
 <div class="d-flex" style="justify-content: center;">

		<div class="span6" style="min-height:900px">
		   <div class="well">
			<h4>Reset your password</h4><br/>
            
	              @if(Session()->has('wrong_code'))
						<div class="alert alert-block alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
                             <p>{{ Session('wrong_code') }}</p>
						</div>
				  @endif
		     <p class="text-orange text-16">Visit your email to get your password reset code.</p>   
            {!! Form::open(['method'=>'PATCH','action'=>['GeneralController@user_password_update',$email],'id'=>'pwd_update']) !!}
        
                <input type="hidden" name="email" value="{{ $email }}">
			  <div class="control-group">
				<label class="control-label" for="code">Verification Code</label>
				<div class="controls">
				  <input name="code" class="span3" id="code"  type="text" placeholder="Enter Verification Code" required>
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="reg_password">New Password</label>
				<div class="controls">
				  <input name="new_password" class="span3" id="reg_password"  type="password" placeholder="Enter your new password" required>
				</div>
                <p style="color: red;" class="d-none" id="password_check"></p>    
			  </div>

			  <div class="control-group">
				<label class="control-label" for="cpassword">Confirm Password</label>
				<div class="controls">
				  <input name="c_pwd" class="span3"  id="cpassword" type="password" placeholder="Re-type password" required>
				</div>
                  <p style="color: red;" class="d-none" id="cpassword_check"></p> 
                
			  </div>

			  <div class="controls">
			  <button type="submit" class="btn block">Submit</button>
			  </div>
			{!! Form::close() !!}
		  </div>
		</div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
 // password.......................
 var passwordF  = $("#reg_password");
 var cpasswordF  = $("#cpassword");

 function passwordValidation(){
  var passwordR = passwordF.val();
    if (passwordR.length < 4) { 
      $("#password_check").text('password must have at least 4 characters').removeClass("d-none").addClass("d-block");
      passwordF.addClass("border-danger");
    return false;
    }else{

        $("#password_check").text('').removeClass("d-block").addClass("d-none");
        passwordF.removeClass("border-danger");  
        return true;
    }
}

 passwordF.on('keyup',function(){
   passwordValidation();
   matchpassword();
});

 function matchpassword(){
        if (passwordF.val() == cpasswordF.val()) {
         $("#cpassword_check").text('').removeClass("d-block").addClass("d-none");
         return true;
        }else{
        $("#cpassword_check").text('password doesn\'t match ').removeClass("d-none").addClass("d-block");
          return false;
        } 
 }

  cpasswordF.on('keyup',function(){
    matchpassword();
});

$("#pwd_update").submit(function(e){
    
    if(matchpassword() && passwordValidation()){
      
    }else{
       e.preventDefault();
    }

});


    });
</script>
@endsection

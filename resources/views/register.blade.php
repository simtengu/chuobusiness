@extends('layouts.homepage')
@section('content')
 <div class="row">
	<div id="sidebar" class="span3">
        @include('includes.sidebar')
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	
	<div class="well">
	    <div style="padding: 4px;margin-bottom: 3px;color: #f79d06">
		<h3> Registration</h3>
		</div>
	<form id="reg_form" method="POST" action="{{ route('user.store') }}" class="form-horizontal" >
		@csrf
		<h4>Your personal information</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name</label>
			<div class="controls">
			  <input class="input-padding input-xlarge" type="text" name="fname" id="fname_field" placeholder="First Name" required="required">
			  <p id="fname_check" class="text-danger d-none"></p>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name</label>
			<div class="controls">
			  <input class="input-padding input-xlarge" type="text" name="lname" id="lname_field" placeholder="Last Name" required="required">
			  <p id="lname_check" class="text-danger d-none"></p>
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email</label>
		<div class="controls">
		  <input class="input-padding input-xlarge" type="email" name="email"  id="email_field" placeholder="Email" required="required">
		  <p id="email_check" class="text-danger d-none"></p>
		</div>
	  </div>

		<div class="control-group">
			<label class="control-label" for="phone"><span>Whatsapp number</span></label>
			<div class="controls">
			  <input class="input-padding input-xlarge" type="number"  name="whatsapp_phone" id="whatsapp_phone_field" placeholder="eg: 0710162838" required="required">
			  <p id="whatsapp_phone_check" class="text-danger d-none"></p>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="phone2"><span><sup>*</sup></label>
			<div class="controls">
			  <input class="input-padding input-xlarge" type="number"  name="phone_2" id="phone_2" placeholder="Other number"/> 
			  <p id="phone_2_check" class="text-danger d-none"></p>
			</div>
		</div>

	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password</label>
		<div class="controls">
		  <input class="input-padding input-xlarge " type="password" name="password" id="reg_password" placeholder="Password" required="required">
		  <p id="password_check" class="text-danger d-none"></p>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="cpassword">Confirm Password</label>
		<div class="controls">
		  <input class="input-padding input-xlarge" type="password" id="cpassword" placeholder="repeat password" required="required">
		  <p id="cpassword_check" class="text-danger d-none"></p>
		</div>
	 </div>  	

		<h4>Your University details</h4>
		<span style="font-weight: bold;color: black;">Location</span>
		<div class="control-group">
			<label class="control-label" for="regions">Region</label>
			<div class="controls">
			  <select id="reg_regions">
			  	<option value="" selected="selected">Select region</option>
                @foreach($Regions as $region)
                  <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
			  </select>
			  <p id="region_msg"  class="text-danger d-none">message</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputLname">University Name</label>
			<div class="controls">
			 <select id="reg_university" name="university_id">
			  	<option value="" selected="selected">Select University</option>

			  </select>
			  <p id="university_id_check" class="text-danger d-none"></p>
			</div>
		</div>

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
		
	<p><sup>*</sup>Optional Field</p>
	
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-warning" type="submit" value="Register" />
			</div>
		</div>		
	</form>
</div>

</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
	
	$(document).ready(function(){
     //region universites ajax fetch
     var regionF = $("#reg_regions");
     $("#reg_university").click(function(){
	      if(regionF.val() == ""){
	       $("#region_msg").text("select region first").removeClass("d-none").addClass("d-block");
	   }
     });

     regionF.on("change",function(){
		  var region_selected = $(this).val();
		   if (region_selected != "") {
		   	   $("#region_msg").removeClass("d-block").addClass("d-none");
			   $.ajax({
			    url: "{{ url('/uv_fetch') }}"+"/"+region_selected,
			    method: "GET",
			    beforeSend: function(){
                 $("#document-loader-div").show();
			    },
			    complete: function(){
                 $("#document-loader-div").hide();
			    },
			    success: function(res){
			      $("#reg_university").replaceWith(res);
			    },
			    error: function(){
			     $("#region_msg").text("Error: sorry something went wrong.. please try again later").removeClass("d-none").addClass("d-block"); 	 
			    }
			   });

		   }else{
             $("#region_msg").text("select region first").removeClass("d-none").addClass("d-block");	
		   }

     });



   // registration fields validation..............................................
   var fnameF =  $("input[name=fname]");
   var lnameF  = $("input[name=lname]");
   var emailF  = $("#reg_form input[name=email]");
   var whatsapp_phoneF  = $("input[name=whatsapp_phone]");
   var phone_2F  = $("input[name=phone_2]");
   var university_idF  = $("#reg_university");

   // email validation.....................................................
    emailF.on('keyup',function(){
	   var em = $(this).val();
      $.ajax({
      	url: "{{ url('/email_validation') }}"+"/"+em ,
      	method: "GET",
      	success: function(rs){
           if (rs == "yes") {  
		    $("#email_check").text('This email is taken').removeClass("d-none").addClass("d-block");
		    emailF.addClass("border-danger");
           }else{
		    $("#email_check").text('').removeClass("d-block").addClass("d-none");
		    emailF.removeClass("border-danger");

           }
      	}
      })
});

   var uv = "";
    $(document).on('change','#reg_university', function(){
        uv = $(this).val();
        $("#university_id_check").text('').removeClass("d-block").addClass("d-none");
    });

    //university validation...................................................
    function universityValidation(){
 	
    	if (uv =="" ) {
            $("#university_id_check").text('Select your university/college ').removeClass("d-none").addClass("d-block");
    		return false;
    	}else{
		$("#university_id_check").text('').removeClass("d-block").addClass("d-none");
		   return true;    		
    	}
    }

// firstname.......................
 function fnameValidation(){
  var fname = fnameF.val();
  if (fname.length < 3) { 
    $("#fname_check").text('firstname must have atleast three characters').removeClass("d-none").addClass("d-block");
    fnameF.addClass("border-danger");
  return false;
  }else{
      $("#fname_check").text('').removeClass("d-block").addClass("d-none");
      fnameF.removeClass("border-danger");  
    return true;  
  }
}

fnameF.blur(function(){
 fnameValidation();
});

// lastname
 function lnameValidation(){
  var lname = lnameF.val();
  if (lname.length < 3) { 
    $("#lname_check").text('lastname must have atleast three characters').removeClass("d-none").addClass("d-block");
    lnameF.addClass("border-danger");
  return false;
  }else{
      $("#lname_check").text('').removeClass("d-block").addClass("d-none");
      lnameF.removeClass("border-danger");  
    return true;  
  }
}

lnameF.blur(function(){
 lnameValidation();
});

function phoneValidation(){
	 var phone = whatsapp_phoneF.val();
	 if (phone.length != 10) {
		$("#whatsapp_phone_check").text('phone number must have 10 characters').removeClass("d-none").addClass("d-block");
		    whatsapp_phoneF.addClass("border-danger");
  
	 	return false;
	 }else{
       $("#whatsapp_phone_check").text('').removeClass("d-block").addClass("d-none");
      whatsapp_phoneF.removeClass("border-danger"); 
	 	return true;
	 }
}

whatsapp_phoneF.on('keyup',function(){
	phoneValidation();
});

function phone2Validation(){
	 var phone2 = phone_2F.val();
	if (phone2.length > 0) {

	 if (phone2.length != 10) {
		$("#phone_2_check").text('phone number must have 10 characters').removeClass("d-none").addClass("d-block");
		    phone_2F.addClass("border-danger");
  
	 	return false;
	 }else{
       $("#phone_2_check").text('').removeClass("d-block").addClass("d-none");
      phone_2F.removeClass("border-danger"); 
	 	return true;
	 }

	}else{
        $("#phone_2_check").text('').removeClass("d-block").addClass("d-none");
        phone_2F.removeClass("border-danger"); 
		return true;
	}
}

phone_2F.on('keyup',function(){
	phone2Validation();
});


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
 

  $("#reg_form").on('submit',function(event){
     lnameValidation();
     fnameValidation();
     universityValidation();
     phoneValidation();
     phone2Validation();
     passwordValidation(); 
     matchpassword()
   if ( phone2Validation() &&lnameValidation() && fnameValidation() && universityValidation() && phoneValidation() && matchpassword() && passwordValidation() ) {
     $(this).submit();
   }else{
    event.preventDefault();  
   }


  });




	});
</script> 
@stop
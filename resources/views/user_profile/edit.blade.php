@extends('layouts.user_profile')
@section('content')
       <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update Your Details</h3>
       
      @if(Session()->has('password_reset_fail'))
       <div class="col-md-6">
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session('password_reset_fail') }}
        </div> 
       </div>
      @endif

      @if(Session()->has('user_updated'))
       <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session('user_updated') }}
        </div> 
       </div>
      @endif
      <div id="new_product" class="mb-2 pt-2 border p-2">
        {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id],'id'=>'product_save','files'=>true]) !!}
          <div id="nwProductFmrow"  class="d-flex">
            <div class="form-group col-md-6">
            {!! Form::label('fname','First Name',['class'=>'text-arial text-17']) !!}
            {!! Form::text('fname',null,['class'=>'form-control','id'=>'fname','required'=>'required']) !!}
            </div>

            <div class="form-group col-md-6">
            {!! Form::label('lname','Last Name',['class'=>'text-arial text-17']) !!}
            {!! Form::text('lname',null,['class'=>'form-control','id'=>'lname','required'=>'required']) !!}
                
            </div>            
          </div>

          <div id="nwProductFmrow">
            <div class="form-group col-md-6">
             {!! Form::label('email','Email') !!}
             {!! Form::email('email',null,['class'=>'form-control','id'=>'email','required'=>'required']) !!}            
            </div>       

            <div class="form-group col-md-6">
             {!! Form::label('whatsapp_phone','Whatsapp number') !!}
             {!! Form::text('whatsapp_phone',null,['class'=>'form-control','id'=>'whatsapp_phone','required'=>'required']) !!}            
            </div>      
          </div>
            <div class="form-group col-md-6">
             {!! Form::label('phone_2','Other number') !!}
             {!! Form::text('phone_2',null,['class'=>'form-control','id'=>'phone_2']) !!}            
            </div> 

          <div class="">
            <h4 class="text-times">University details</h4>
            <label class="text-times text-18 d-block">Name: <span class="text-info">{{ $user->university->name  }}</span></label>
            <span class="text-arial">You can change it here</span>
            <div class="form-group col-md-6">
              <label class="control-label text-arial" for="regions">Region</label>
                <select id="reg_regions" class="form-control">
                  <option value="" selected="selected">Select region</option>
                        @foreach($regions as $region)
                          <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                </select>
                <p id="region_msg"  class="text-danger d-none">message</p>
             
            </div>

            <div class="form-group col-md-6">
              <label class="control-label text-arial d-block" for="inputLname">University Name</label>
               <select id="reg_university" name="university_id" class="form-control">
                  <option value="" selected="selected">Select University</option>

                </select>
                <p id="university_id_check" class="text-danger d-none"></p>
            </div>
          </div>
          
          <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
      {!! Form::close() !!}
      </div>
      @if(Session()->has('password_reset_fail'))
       <div class="col-md-6">
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session('password_reset_fail') }}
        </div> 
       </div>
      @endif

      <div class="col-sm-8 col-md-6">
        <div class="card mt-3">
          <div class="card-header">
             <h4 class="text-info text-arial">Reset Password here</h4>
          </div>
          <div class="card-body">
         <form id="reset_password_form" method="POST" action="{{ route('password_reset',$user->id) }}">
          @csrf
          <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
              <label class="control-label text-arial" for="current_pwd">Current Password</label>
                <input class="form-control " type="password" name="current_pwd" id="current_pwd" placeholder="Enter your current password" required="required" value="">
                <p id="current_password_check" class="text-danger d-none"></p>
            </div>

            <div class="form-group">
              <label class="control-label text-arial" for="reg_password">New Password</label>
                <input class="form-control" type="password" name="password" id="reg_password" placeholder="Enter new password" required="required" value="">
                <p id="password_check" class="text-danger d-none"></p>
            </div> 

            <div class="form-group">
              <label class="control-label text-arial" for="cpassword">Confirm Password</label>
                <input class="form-control" name="cpassword" type="password" id="cpassword" placeholder="repeat new password" required="required" value="">
                <p id="cpassword_check" class="text-danger d-none"></p>
             </div> 
               <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Confirm reset</button>
           </form>
          </div>
        </div> 
      </div>
@endsection
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

 // password reset validation functions.......................
 var passwordF  = $("#reg_password");
 var cpasswordF  = $("#cpassword");
 var current_passwordF  = $("#current_pwd");

 current_passwordF.on('keyup',function(){
  current_password_validation();
 });

function current_password_validation(){
  var current_pwd = current_passwordF.val();
    if (current_pwd.length < 4) { 
      $("#current_password_check").text('password must have at least 4 characters').removeClass("d-none").addClass("d-block");
      current_passwordF.addClass("border-danger");
    return false;
    }else{

        $("#current_password_check").text('').removeClass("d-block").addClass("d-none");
        current_passwordF.removeClass("border-danger");  
        return true;
    }

}

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


  $("#reset_password_form").on('submit',function(event){
     passwordValidation(); 
     matchpassword();
     current_password_validation();
   if (current_password_validation() && matchpassword() && passwordValidation() ) {
     $(this).submit();
   }else{
    event.preventDefault();  
   }

  });


  });



 </script>
 
@endsection

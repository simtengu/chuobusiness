@extends('layouts.user_profile')
@section('content')
       <div class="row p-2 mt-3">
        <div class="col-12">
          <div class="col-md-7">
            @if(Session()->has('premium_req_canceled'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session('premium_req_canceled') }}
            </div>
            @endif
       @if($status == 1)
        <div class="p-2">
          <center><span class="text-success">THIS PRODUCT IS ALREADY PREMIUM</span></center>
        </div>
        @elseif($status == 2)
   <!--  delete request form .................................... -->
       <div id="delete-formm" class="text-center card py-3">
         <label class="text-successs">The request for this product has already been received</label>
          <label style="font-family: times new roman;">you can still cancel it if you wish</label>
         {!! Form::open(['method'=>'DELETE','action'=>['ProductsController@delete_premium_request',$p_request[0]->id],'id'=>'requestFormDelete']) !!}
           <button type="submit" class="btn btn-danger bt-md px-3 mt-1">Remove request</button>
         {!! Form::close() !!}
       </div> 
   <!--     end of delete form ............................. -->
         @elseif($status == 3)
         {{-- there is a room for upgrading the product to premium............................ --}}
          <div class="card mb-2">
            <div id="premium_heading" class="card-header text-info"> <h5 style="font-family: arial narrow">All Procedures</h5></div>
            <div class="card-body" style="font-family: times new roman;">
              <div id="confirmation_form">
                 <form id="premiumSubmitForm" method="post" action="{{ route('premium_check') }}">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="form-group">
                    <label for="Package_field">Select Package</label>
                    <select id="Package_field" name="package" class="form-control">
                      <option value="1">1000Tsh/week</option>
                      <option value="2">4000Tsh/month</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="number">Your payment number</label>
                    @if(Auth::user()->phone_2)
                      <span class="d-block text-info">change if you are not paying with any of these numbers </span>
                    @else
                      <span class="d-block text-info">change if you are not paying with this number </span>
                    @endif
                    
                    <input name="user_phone" type="text" class="form-control" id="phone_number" placeholder="your payment number" value="{{ $phone }}" required>
                  </div>
                  <span class="d-block text-warning"><span class="font-weight-bold">Warning: </span>Don't pay before submiting this form </span>
                  <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
              </div>
              <div id="cancel_request_form" class="py-2 " style="display: none;">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Your request was successful submitted.........<br>
                    Finish up with payment.
                </div>
               <span class="d-block text-info">We expect to receive your payment through the number below </span> 
               <h4 id="phone_field"></h4>
               <div class="jumbotron jumbotron-fluid">
                 <div class="container text-center">
                  <h4 class="text-primary">Pay to: </h4> 
                  <h3>{{ config('global.vodapayment_number') }} Mpesa</h3>
                  <label>or</label>
                  <h3>{{ config('global.tigopayment_number') }} TigoPesa</h3>
                   <label>Name: {{ config('global.albert') }}</label>
                 </div>
               </div>
                <div class="p-2 text-info">The product will automatically be upgradated to premium within few minutes after your payment.</div>
              </div> 
            </div>
          </div>
          @else 
            <div class="p-2">
              <center><span class="text-warning">SORRY THE ROOM FOR PREMIUM PRODUCTS IS ALREADY FULL .. PLEASE COME AGAIN NEXT TIME</span></center>
            </div>

        @endif
          </div>
        </div>
        <div class="col-12">
        <h4 class="text-info text-capitalize py-2">Product details</h4>  
        </div>
        @if(count($product->photo))
       	@foreach($product->photo as $photo)
         <div class="col-6 col-sm-3">
           <img src="{{ asset('images') }}/{{ $photo->name }}" class="img-thumbnail img-fluid">
         </div>
         @endforeach
         @else
         <center id="imagesCountMessage" class="text-danger">you need atleast one image for your item</center>
         @endif
       </div>
       <div class="row p-2">
        <div class="col-md-6">
         <h3>{{ $product->product_name }}</h3>
         @if($product->period_value )<h5>Used for {{ $product->period_value }} {{ $product->period->name }}@if($product->period_value != 1)s @endif</h5> @endif 
         <h5>{{ $product->product_price }} <span class="text-info">Tsh</span></h5> 
        </div>
        <div class="col-md-6">
          <div class="car p-2">
            <h4 class="text-info text-dark">product description</h4>
          <p class="text-lead text-justify">{{ $product->product_description }}</p>            
          </div>

        </div>

       </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    
   $(document).ready(function(){
      
      $("#premiumSubmitForm").submit(function(e){
       e.preventDefault();
       var fon = $("#phone_number").val();
       $.ajax({
        url: "{{ route('premium_check') }}",
        method: "POST",
        dataType: "json",
        data: new FormData($("#premiumSubmitForm")[0]),
        contentType: false,
        processData: false,
        beforeSend: function(){
                 $("#document-loader-div").show();
          },
        complete: function(){
                 $("#document-loader-div").hide();
          },
        success: function(rs){
          if (rs.status == 1) {
            alert(rs.message);
          }else if(rs.status == 2){
            $("#phone_field").text(fon);
            $("#confirmation_form").hide();
            $("#cancel_request_form").show();
          }else{
            alert(rs.message);
          }

        },
        error: function(){
          alert("something is wrong... try again later")
        }

       });


      });

      $("#requestFormDelete").submit(function(e){
        var a = confirm("If you have paid there won't be refunding..");
        if (a == false) {
          e.preventDefault();
        }
      });
   });

  </script>
@stop

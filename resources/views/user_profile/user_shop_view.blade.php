<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--  styles............................................... -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style type="text/css">
      
      #product-div #link:hover {
        text-transform: none !important;
        text-decoration: none !important;
      }

      .link{
        text-decoration: none;
      }
      .link:hover {
        text-decoration: none;
      }

      #product-div #products_table {
        min-width: 100%;
      }
      #product-div #products_table td {
        min-width: 33%;

      }


       #user-links-div {
        background-color: #e5e5e5; height: max-content; width: 200px;
       }

      #user-links-div a {
        padding: 6px 16px;
      }

      #user-links-div #new_product_btn {
        padding: 5px 16px;
        margin-top: 9px;
        border-radius: 20px;
        background-color: #8cc2ff;
        color: #fff;
        border: none;
      }

      #product-div #products_table #right {
        min-width: 33%;
        text-align: center;
      }

      #delete-form {
        position: fixed;
        top: 10vh;
        left: 35%;
        right: 35%;
        padding: 15px;
        box-shadow: 2px 2px 300px black;
        display: none;
        z-index: 4;
        background-color: #8cc2ff;
        height: auto;
      }

      #delete-form h4{
        text-shadow: 1px 1px 2px black;
      }
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
.media:hover {
   box-shadow: 2px 2px 4px black;
}
    </style>
</head>
<body class="p-0 m-0">

  <section id="userProfile-top-div" class="p-1">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-11 ">
    <div class="d-flex flex-column text-light">
       <div class="pt-1">             
          <h3 style="font-family: times new roman; font-weight: bold;text-shadow: 1px 1px 1px black;" class="m-0 p-0 text-capitalize">{{ $user->fname ?? ""}}  {{ $user->lname ?? "" }}</h3>                
       </div>
       <span style="font-family: times new roman;text-shadow: 1px 1px 1px black;" class="p-0 m-0">{{ $user->email ?? "" }}</span>
          <div class="d-flex justify-content-between">
            <div class="d-flex p-0 m-0 ">
            <label class="text-uppercase" style="text-shadow: 1px 1px 1px black;">{{ $user->university->name ?? "" }} ,</label>
            <label class="ml-2" style="text-shadow: 1px 1px 1px black;">{{ $user->whatsapp_phone ?? "" }}</label>  
            </div>
            <div class="pb-2">
              @if(Auth::check())
                @if(Auth::user()->id == $user->id)
                  <a style="box-shadow: 1px 1px 1px black;" href="{{ route('user.index') }}" class="btn btn-sm btn-light"><span class="glyphicon glyphicon-home  mr-1"></span> Back</a> 
                 @else
                  <a style="box-shadow: 1px 1px 1px black;" href="{{ url('/') }}" class="btn btn-sm btn-light"><span class="glyphicon glyphicon-home  mr-1"></span> Home</a> 
                @endif
                 
               @else
                  <a style="box-shadow: 1px 1px 1px black;" href="{{ url('/') }}" class="btn btn-sm btn-light"><span class="glyphicon glyphicon-home  mr-1"></span> Home</a> 
              @endif          
            </div>

          </div>
       
          
    </div>          
        </div>
      </div>

   </div> 
  </section>
   <div class="container-fluid">
   <div class="row pb-4">
    @if(Auth::check() && Auth::user()->id == $user->id)
     <div class="col-12 mt-2">
        <input style="padding: 2px; border-radius: 4px;" type="text" class="border border-info " value="{{ route('user.shop',$user->email) }}" id="myInput">
       <button onclick="myFunction()" class="btn btn-sm btn-info">Copy shop link</button>
       <label id="copy_message" class="text-success d-block mt-2 text-18 text-times"></label>
     </div>
     @endif
     <div  class="col-md-2 bg-primary d-flex justify-content-center ">
          <!-- advertisment here.............. -->
     </div>
 <!--     profile main section...................................................... -->
     <div style="min-height: 70vh !important" class="col-md-10">
      <div class="row">
      @if(count($products))
         @foreach($products as $product)
         @if(count($product->photo))
         <div class=" col-md-6 col-lg-4 mt-1">
          <a class="link" href="{{ route('item_preview',[1,$product->id]) }}">
            <div class="media border p-1">
              <img style="width: 45%; height: auto;" src="{{ asset('images') }}/{{ $product->photo[0]->name }}" >
              <div class="media-body p-1">
                <h5 class="font-weight-bold text-arial text-16">{{ $product->product_name }}</h5>
                  <label class="mb-0 text-dark">{{ number_format($product->product_price)  }}<span class="text-warning">Tsh</span></label>
                <p class="card-text text-times text-dark">
                  {{ Str::limit($product->product_description,45) }}
                </p>    
              </div>
            </div>
           </a>
         </div>
          @endif
        @endforeach
       @else 
       <h4 class="text-info text-uppercase ">No products yet</h4>
      @endif
      </div>

<!--       <div class="row py-2">
      @if(count($products))
         @foreach($products as $product)
         @if(count($product->photo))
          <div class="col-sm-6 col-md-4 col-xl-3 mt-1">
           <a href="{{ route('item_preview',[1,$product->id]) }}">
            <div class="card">
              <img class="card-img-top" src="{{ asset('images') }}/{{ $product->photo[0]->name }}">
              <div class="card-body">
                <label class="d-block text-dark">{{ $product->product_name }}</label>
                <label class=" text-dark">{{ number_format($product->product_price)  }}<span class="text-warning">Tsh</span></label>
                <p class="card-text text-times text-dark">
                  {{ Str::limit($product->product_description,45) }}
                </p>
              </div>
            </div>
          </a>
          </div>
          @endif
        @endforeach
       @else 
       <h4 class="text-info text-uppercase ">No products yet</h4>
      @endif


      </div> -->
   <!--    pagination..................... -->
         <div class="text-center mt-2">
           @if(count($products))
            {{ $products->render()}}
            @endif
         </div> 


     </div>
 <!-- end of profile main section................................................... -->
   </div>
 </div>
 <!-- window preloader div............................................ -->
  <div id="document-loader-div">
    <div id="loader-img">
    <img src="{{ asset('themes/images/ajaxloader3.gif') }}">
    </div>
  </div>
  <script type="text/javascript">
    function myFunction() {

      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999)
      document.execCommand("copy");
       document.getElementById("copy_message").innerHTML = "shop link copied successfully . Share it to other peope now";

    }

</script>
</body>
</html>

 




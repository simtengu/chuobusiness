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
    </style>
</head>
<body class="p-0 m-0">

  <section id="userProfile-top-div" class="p-1">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-11 ">
    <div class="d-flex flex-column text-light">
       <div class="pt-1">             
         @auth <h3 style="font-family: times new roman; font-weight: bold;text-shadow: 1px 1px 1px black;" class="m-0 p-0 text-capitalize"> {{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3> @endauth
                         
       </div>
       @auth<span style="font-family: times new roman;text-shadow: 1px 1px 1px black;" class="p-0 m-0">{{ Auth::user()->email }}</span>
          <div class="d-flex justify-content-between">
            <div class="d-flex p-0 m-0 ">
            <label class="text-uppercase" style="text-shadow: 1px 1px 1px black;">{{ Auth::user()->university->name }} ,</label>
            <label class="ml-2" style="text-shadow: 1px 1px 1px black;">{{ Auth::user()->whatsapp_phone }}</label>  
            <a class="text-dark px-2 " href="{{ route('user.edit',Auth::user()->id) }}"><span class="glyphicon glyphicon-edit  ml-3 mt-1"></span></a>
            </div>
            <div class="pb-2">
                  <a style="box-shadow: 1px 1px 1px black;" href="{{ url('/') }}" class="btn btn-sm btn-light"><span class="glyphicon glyphicon-home  mr-1"></span> Home</a>           
                  <form class="d-none" id="logout-form" method="POST" action="{{ route('signout') }}">
                    @csrf 
                  </form>
            </div>
          </div>
       @endauth
          
    </div>          
        </div>
      </div>

   </div> 
  </section>
   <div class="container-fluid">
   <div class="row pb-4">
     <div  class="col-md-3 d-flex justify-content-start ">
          <div id="user-links-div" class="mt-4 py-2">       

               <div class="d-flex flex-column text-lead text-capitalize"> 
                 <a style="font-size: 21px;" href="{{ route('product.premium') }}" class="text-warning d-block">+Premium</a>
                 @if(Auth::user()->isAdmin())
                 <a href="{{ route('chuoproduct.index') }}" class="text-primary d-block">Chuobusiness Shop</a>
                 @endif
                 <a href="{{ route('user.index') }}" class="text-info">View Products</a>
                 <a href="{{ route('user.shop',Auth::user()->email) }}" class="text-info">My shop</a>
                 @if($cat_count > 0)
                  @foreach($categories as $category)
                   
                <a href="{{ route('user_cat.products',$category->category_id) }}" class="text-info text-lowercase">
                {{ $category->category->name }} <label class="badge badge-info">({{ $category->total }})</label></a>
                  @endforeach
                 @endif
                 <a class="text-info" href="{{ route('signout') }}"
                     onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> <span class="glyphicon glyphicon-log-out  mr-1"></span>logout </a>
               </div>
               <p class="text-center mt-2">
                <a href="{{ route('product.create') }}"  id="new_product_btn">+New Item
                </a>
               </p>


            
           </div> 
     </div>
 <!--     profile main section...................................................... -->
     <div style="min-height: 70vh !important" class="col-md-8">
      @yield('content')
     </div>
 <!-- end of profile main section................................................... -->
     <div class="col-md-1">
        
     </div>
   </div>
 </div>
 <!-- window preloader div............................................ -->
  <div id="document-loader-div">
    <div id="loader-img">
    <img src="{{ asset('themes/images/ajaxloader3.gif') }}">
    </div>
  </div>

  <!-- scripts -->
  <script src="{{ asset('js/jquery-3.4.1.min.js')}} "></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js')}} "></script>
  <script src="{{asset('js/app.js')}}"></script> 
  <script src="{{asset('js/userProfile.js')}}"></script> 
  <script src="{{asset('js/userprofiles.js')}}"></script> 
   @yield('scripts')
</body>
</html>

 




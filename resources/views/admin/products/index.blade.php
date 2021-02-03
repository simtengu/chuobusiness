@extends('layouts.admin')           
@section('content')
  <div class="container-fluid">
    @if(session()->has('product_added'))
    <div class="row">
      <div class="col-12 pt-3">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
         <span>{{ session('product_added') }}</span>
        </div>
      </div>
    </div>
    @endif
    @if(session()->has('product_deleted'))
    <div class="row">
      <div class="col-12 pt-3">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
         <span>{{ session('product_deleted') }}</span>
        </div>
      </div>
    </div>
    @endif

       <div class="row">
      @if(count($products))
         @foreach($products as $product)
         @if(count($product->image))
         <div class=" col-md-6 col-lg-4 mt-1">
           <a class="text-dark" href="{{ route('adminProduct.show',$product->id) }}" id="adminProductLink">
            <div class="media border p-1">
              <img style="width: 45%; height: auto;" src="{{ asset('pictures') }}/{{ $product->image[0]->name }}" alt="John Doe">
              <div class="media-body p-1">
                <h5 class="font-weight-bold text-arial font-16">{{ $product->product_name }}</h5>
                  <label class=" text-dark mb-0">{{ number_format($product->product_price)  }}<span class="text-warning">Tsh</span></label>
                <p class="card-text text-times text-dark">
                 <span class="text-warning">Owner: </span> {{ $product->user->fname }}
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
  </div>
@endsection   
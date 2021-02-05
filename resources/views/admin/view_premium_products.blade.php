    @extends('layouts.admin')           
      @section('content')
                    <div class="container-fluid">
                        <h3 class="my-2 font-weight-bold text-times">All Premium Products</h3>
                        <div id="userProductsDiv" class="row mt-2">
                            @if(count($premium_products))
                               @foreach($premium_products as $product) 
                               <div class=" col-md-6 col-lg-4 mt-1">
                              <a class="link" href="{{ route('item_preview',[1,$product->product_id]) }}">
                                  <div class="media border p-1">
                                    <img style="width: 45%; height: auto;" src="{{ asset('images') }}/{{ $product->product->photo[0]->name }}" >
                                    <div class="media-body p-1">
                                      <label class="font-weight-bold text-arial text-16 d-block">{{ $product->product->product_name }}</label>
                                        <label class="mb-0 text-dark">{{ number_format($product->product->product_price)  }}<span class="text-warning">Tsh</span></label>
                                      <p class="card-text text-times text-dark">
                                          Since: {{ $product->created_at->diffForHumans() }}
                                      </p>    
                                    </div>
                                  </div>
                                </a>
                               </div>
                              @endforeach
                             @else 
                             <h4 class="text-info text-uppercase ">No products yet</h4>
                            @endif   
                        </div>          
                    </div>
           @endsection

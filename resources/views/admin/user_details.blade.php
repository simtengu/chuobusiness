    @extends('layouts.admin')           
      @section('content')
                    <div class="container-fluid">

                      @if(session()->has('user_updated'))
                      <div class="row">
                        <div class="col-12 pt-3">
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <span>{{ session('user_updated') }}</span>
                          </div>
                        </div>
                      </div>
                      @endif

                    @if(session()->has('role_changed'))
                      <div class="row">
                        <div class="col-12 pt-3">
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <span>{{ session('role_changed') }}</span>
                          </div>
                        </div>
                      </div>
                      @endif

                        <h3 class="mt-4 font-weight-bold text-times">User details</h3>
                        <div class="card mb-4">
 {{-- user password reset modal...........................  --}}
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-arial"><span class="text-warning">(A/C)  </span>{{ $user->email }} </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
         <a class="p-3 text-18 text-arial" href="{{ route('admin.userPasswordReset',$user->id) }}">Generate new password</a>
         <div class="mt-2 pl-3">
          <label class="card-heading text-arial">Change user role</label>
           {!! Form::model($user,['method'=>'GET','action'=>['AdminController@changeUserRole']]) !!}
             <input id="user_id" type="hidden" value="{{ $user->id }}" name="user_id">
             <div   class="row">
               <div class="form-group col-sm-6">
                {!! Form::select('role_id',$roles,null,['class'=>'form-control','id'=>'role_id','required'=>'required']) !!}
               </div>
              </div>
              {!! Form::submit('Change', ['class'=> 'btn btn-primary mb-1']) !!}
              {!! Form::close() !!}   
         
          </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
</div>
 {{-- end of password reset modal........................ --}}
                                  <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Region</th>
                                                <th>University</th>
                                                <th>update</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $user->fname }} {{ $user->lname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->whatsapp_phone }}</td>
                                                <td>{{ $user->university->region->name }}</td>
                                                <td>{{ $user->university->name }}</td>
                                                <td>
                                                  <button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#myModal">
                                                   Update
                                                  </button>
                                                </td>
                                                <td><button class="btn btn-md btn-danger">Delete</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                           
                        </div>
                        <div class="row">
                          <h3 class="mt-2 font-weight-bold text-times">User products</h3>
                        </div>
                        <div id="userProductsDiv" class="row mt-2">
                            @if(count($products))
                               @foreach($products as $product) 
                               <div class=" col-md-6 col-lg-4 mt-1">
                              <a class="link" href="{{ route('item_preview',[1,$product->id]) }}">
                                  <div class="media border p-1">
                                    <img style="width: 45%; height: auto;" src="{{ asset('images') }}/{{ $product->photo[0]->name }}" >
                                    <div class="media-body p-1">
                                      <label class="font-weight-bold text-arial text-16 d-block">{{ $product->product_name }}</label>
                                        <label class="mb-0 text-dark">{{ number_format($product->product_price)  }}<span class="text-warning">Tsh</span></label>
                                      <p class="card-text text-times text-dark">
                                        {{ Str::limit($product->product_description,45) }}
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
@section('scripts')
  <script type="text/javascript">
      $(document).ready(function(){


      }

  </script>
@stop
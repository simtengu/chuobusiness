    @extends('layouts.admin')           
      @section('content')
     
      <div class="container-fluid">

                        @if(session()->has('category_deleted'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('category_deleted') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('brand_deleted'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('brand_deleted') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('brand_updated'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('brand_updated') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('category_updated'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('category_updated') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('category_added'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('category_added') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('brand_added'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('brand_added') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

          <div class="row px-2 my-2">
              <div class="col-md-6">
                  <h4 class="text-dark text-times">Product Categories</h4>
                <div class="card">
                    <div class="card-header">
                      {!! Form::open(['method'=>'POST','action'=>'AdminController@addCategory']) !!}
                       <div class="form-group">
                           <div class="d-inline-flex">
                           {!! Form::text('category', null, ['required'=>'required','class'=>'form-control','placeholder'=>'Add Category']) !!}
                           {!! Form::submit('Add', ['class'=>'btn btn-primary btn-md']) !!}
                           </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Id</th>
                                                <th colspan="2">Category Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php $a = 1; ?>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $a }}</td>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td><a href="{{ route('admin.editCategory',$category->id) }}" class="btn btn-sm btn-warning">More</a></td>
                                            </tr>
                                            <?php $a++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                     
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                  <h4 class="text-dark text-times">Product Brands</h4>
                <div class="card mt-2">
                    <div class="card-header">
                      {!! Form::open(['method'=>'POST','action'=>['AdminController@addBrand']]) !!}
                       <div class="form-group">
                           <div class="d-inline-flex">
                           {!! Form::text('brand', null, ['required'=>'required','class'=>'form-control','placeholder'=>'Add Brand']) !!}
                           {!! Form::submit('Add', ['class'=>'btn btn-primary btn-md']) !!}
                        </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Id</th>
                                                <th colspan="2">Brand Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php $b = 1; ?>
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>{{ $b }}</td>
                                                <td>{{ $brand->id }}</td>
                                                <td>{{ $brand->name }}</td>
                                                <td><a href="{{ route('admin.editBrand',$brand->id) }}" class="btn btn-sm btn-warning">More</a></td>
                                            </tr>
                                            <?php $b++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                     
                    </div>
                </div>

              </div>
          </div>
      </div>

      @endsection

    @extends('layouts.admin')           
      @section('content')
        <div class="container-fluid">
             <div class="p-3">
                 <h4 class="text-info text-times">Reported Posts</h4>
             </div>
                             @if(count($products))
                                  <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Region</th>
                                                <th>University</th>
                                                <th>view</th>
                                                <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->user->fname }} {{ $product->user->lname }}</td>
                                                <td>{{ $product->user->email }}</td>
                                                <td>{{ $product->user->whatsapp_phone }}</td>
                                                <td>{{ $product->university->region->name }}</td>
                                                <td>{{ $product->university->name }}</td>
                                                <td><a href="{{ route('item_preview',[1,$product->id]) }}" class="btn btn-md btn-primary">view</a></td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteReportedPost',$product->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-md px-3">Delete</button>
                                                    {!! Form::close() !!} 
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="p-3 ml-2"><h4>No reported products yet</h4></div>
                              @endif
        </div>
      @endsection

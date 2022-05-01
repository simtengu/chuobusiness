@extends('layouts.admin')           
@section('content')
                    <div class="container-fluid py-3">
                        @if(session()->has('premium_request_verified'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('premium_request_verified') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif
                      @if(count($premium_logs))
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Premium logs
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>college</th>
                                                <th colspan="2">Message</th>
                                                
                                            </tr> 
                                        </thead>
                                        <tbody>
                                         <?php $a = 1; ?>
                                        @foreach($premium_logs as $message)
                                            <tr>
                                                <td>{{ $a }}</td>
                                                <td>{{ $message->user->fname }}</td>
                                                <td>{{ $message->user->email }}</td>
                                                <td>{{ $message->user->whatsapp_phone }}</td>
                                                <td>{{ $message->user->university->name }}</td>
                                                <td>{{ $message->message }}</td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deletePremiumLog',$message->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-md px-3">Delete</button>
                                                    {!! Form::close() !!} 
                                                </td>
                                            </tr>
                                            <?php $a++; ?>
                                        @endforeach
                                    
                                        </tbody>
                                    </table>
                                </div>
      
                            </div>
                        </div>
                          @else 
                           <div class="py-3">
                               <h5 class="text-times">No logs for premium requests yet</h5>
                           </div>
                       @endif
            
                      @if(count($premium_requests)) 
                        <div class="card mb-1">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Premium requests
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Owner</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>verify</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $b = 1; ?>
                                        @foreach($premium_requests as $message)
                                            <tr> 
                                                <td>{{ $b }}</td>
                                                <td>{{ $message->product->user->fname }} {{ $message->product->user->lname }}</td>
                                                <td>{{ $message->product->user->email }}</td>
                                                <td>{{ $message->product->user->whatsapp_phone }}</td>
                                                <td><a href="{{ route('admin.verifyPremiumRequest',$message->product_id) }}" class="btn btn-info btn-md">verify</a></td>
                                                <td><a  href="{{ route('item_preview',[1,$message->product->slug]) }}" class="btn btn-success btn-md">view</a></td>
                                            </tr>
                                            <?php $b++; ?>
                                        @endforeach
                                    
                                        </tbody>
                                    </table>
                                </div>
      
                            </div>
                        </div>
                        @else 
                         <div class="py-2 mt-2">
                              <h5 class="text-times">There is no premium requests at the moment</h5>
                         </div>
                     @endif
                    </div>
@endsection

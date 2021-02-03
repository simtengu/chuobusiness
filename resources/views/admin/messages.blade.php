@extends('layouts.admin')           
@section('content')
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Unfound college requests
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>college</th>
                                                <th>region</th>
                                                <th>view</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     @if(count($college_requests))
                                        @foreach($college_requests as $message)
                                            <tr>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->college_name }}</td>
                                                <td>{{ $message->region }}</td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteCollegeRequest',$message->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-md px-3">Delete</button>
                                                    {!! Form::close() !!} 
                                                </td>
                                            </tr>
                                        @endforeach
                                     @endif
                                        </tbody>
                                    </table>
                                </div>
      
                            </div>
                        </div>
                        <div class="card mb-1">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Contact us messages
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>body</th>
                                                <th>view</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     @if(count($messages))
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->phone }}</td>
                                                <td>{{ $message->body }}</td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteMessage',$message->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-md px-3">Delete</button>
                                                    {!! Form::close() !!} 
                                                </td>
                                            </tr>
                                        @endforeach
                                     @endif
                                        </tbody>
                                    </table>
                                </div>
      
                            </div>
                        </div>
                    </div>
@endsection

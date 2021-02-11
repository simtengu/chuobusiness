@extends('layouts.admin')           

@section('content')
  <div class="container">
                        @if(session()->has('university_updated'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('university_updated') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif
                        
            <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update University</h3>
            <div class="m-2 p-2">
                {!! Form::model($university,['method'=>'PATCH','action'=>['AdminController@updateUniversity',$university->id]]) !!}
                  <div class="form-group col-sm-6">
                    {!! Form::label('region_id','Region Name') !!}
                        {!! Form::select('region_id',$regions,null,['class'=>'form-control','id'=>'region_id','required'=>'required']) !!}  
                  </div>

                    <div class="form-group col-sm-6">
                      {!! Form::label('name','University Name') !!}
                      {!! Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) !!}
                    </div>   
                    <div class="form-group col-sm-6">
                      {!! Form::label('aka','University aka') !!}
                      {!! Form::text('aka', null, ['class'=>'form-control','placeholder'=>'Enter university aka','id'=>'aka']) !!}
                    </div>       
                    <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
                 {!! Form::close() !!} 
            </div> 
            <div class="m-2 p-2">
                <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Delete University</h3>
                {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteUniversity',$university->id],'id'=> 'universityDeleteForm']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </div>
 
  </div> 
@endsection

@section('scripts')
 <script type="text/javascript">

  $(document).ready(function(){
      $("#universityDeleteForm").submit(function(e){
        
         if( !(confirm("Confirm deleting this University"))){
              e.preventDefault();
         }
      });

  });



 </script>
 
@endsection
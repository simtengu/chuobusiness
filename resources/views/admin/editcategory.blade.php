@extends('layouts.admin')           

@section('content')
  <div class="container">
       @isset($category)
            <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update Category</h3>
            <div class="m-2 p-2">
                {!! Form::model($category,['method'=>'PATCH','action'=>['AdminController@updateCategory',$category->id],'files'=>true]) !!}
                    <div class="form-group col-sm-6">
                    {!! Form::label('name','Category Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) !!}
                    </div>          
                    <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
                 {!! Form::close() !!} 
            </div> 
            <div class="m-2 p-2">
                <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Delete Category</h3>
                {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteCategory',$category->id],'id'=> 'categoryDeleteForm']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </div>
        @endisset

       @isset($brand)
            <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update Brand</h3>
            <div class="m-2 p-2">
                {!! Form::model($brand,['method'=>'PATCH','action'=>['AdminController@updateBrand',$brand->id],'files'=>true]) !!}
                    <div class="form-group col-sm-6">
                    {!! Form::label('name','Brand Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) !!}
                    </div>          
                    <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
                 {!! Form::close() !!}
            </div> 
            <div class="m-2 p-2">
                <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Delete Brand</h3>
                {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteBrand',$brand->id],'id'=> 'brandDeleteForm']) !!}
                 {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </div>
        @endisset

  </div> 
@endsection

@section('scripts')
 <script type="text/javascript">

  $(document).ready(function(){
      $("#brandDeleteForm").submit(function(e){
        
         if( !(confirm("Confirm deleting this brand"))){
              e.preventDefault();
         }
      });

  });

  $(document).ready(function(){
      $("#categoryDeleteForm").submit(function(e){
        
         if( !(confirm("Confirm deleting this category"))){
              e.preventDefault();
         }
      });

  });



 </script>
 
@endsection
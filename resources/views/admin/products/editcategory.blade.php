@extends('layouts.admin')           

@section('content')
  <div class="container">
       @isset($category)
            <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update Category</h3>
            <div class="m-2 p-2">
                {!! Form::model($category,['method'=>'PATCH','action'=>['AdminController@updateCategory',$category->id],'id'=> 'categoryEditForm']) !!}
                    <div class="form-group col-sm-6 ">
                    {!! Form::label('name','Category Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control ','id'=>'name','required'=>'required']) !!}
                    </div>          
                    <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
                 {!! Form::close() !!}
            </div> 

        @endisset

       @isset($brand)
            <h3 style="color: #8cc2ff; font-family: arial-narrow;margin-top: 1em;">Update Brand</h3>
            <div class="m-2 p-2">
                {!! Form::model($brand,['method'=>'PATCH','action'=>['AdminController@updateBrand',$brand->id],'id'=> 'brandEditForm']) !!}
                    <div class="form-group col-sm-6 col-md-4">
                    {!! Form::label('name','Brand Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) !!}
                    </div>          
                    <button style="background-color: #8cc2ff; color: #fff" type="submit" class="btn">Update</button>
                 {!! Form::close() !!}
            </div> 


        @endisset

  </div> 
@endsection

@section('scripts')
 <script type="text/javascript">

  $(document).ready(function(){
   

  });



 </script>
 
@endsection
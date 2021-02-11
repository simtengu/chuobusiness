    @extends('layouts.admin')           
      @section('content')
        <div class="container-fluid">
             <div class="p-3">
                 <h4 class="text-info text-times">Reported Post</h4>
             </div>
          <div class="row mb-1"> 
                  <div id="removeProduct" class=" py-3">
                   {!! Form::open(['method'=>'DELETE','action'=>['AdminController@deleteReportedProduct',$product->id]]) !!}
                     <h4  class="text-dark text-times">Confirm product delete</h4>
                     <button type="submit" class="btn btn-danger btn-sm px-3">ok</button>
                   {!! Form::close() !!}
                 </div> 
          </div>
              
        </div>
      @endsection

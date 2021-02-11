    @extends('layouts.admin')           
      @section('content')
     
      <div class="container-fluid">

                        @if(session()->has('university_deleted'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('university_deleted') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

                        @if(session()->has('university_added'))
                        <div class="row">
                        <div class="col-12 pt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span>{{ session('university_added') }}</span>
                            </div>
                        </div>
                        </div>
                        @endif

          <div class="row px-2 my-2">
              <div class="col-md-9">
                  <h4 class="text-dark text-times">Universities List ({{ count($universities) }})</h4>
                <div class="card mt-2">
                    <div class="card-header">
                      {!! Form::open(['method'=>'POST','action'=>['AdminController@addUniversity']]) !!}
                       <div class="form-group">
                           <select required name="region_id" class="form-control">
                               <option value="">Select Region</option>
                               @foreach($regions as $region)
                               <option value="{{ $region->id }}">{{ $region->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           {!! Form::text('name', null, ['required'=>'required','class'=>'form-control','placeholder'=>'Enter  University name']) !!}
                        </div>
                       <div class="form-group">
                           {!! Form::text('aka', null, ['class'=>'form-control','placeholder'=>'Enter university aka']) !!}
                        </div>
                        {!! Form::submit('add',['class'=>'btn btn-primary btn-md']) !!}

                      {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>University</th>
                                                <th>Aka</th>
                                                <th colspan="2">Region</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php $b = 1; ?>
                                        @foreach($universities as $university)
                                            <tr>
                                                <td>{{ $b }}</td>
                                                <td>{{ $university->name }}</td>
                                                <td>{{ $university->aka ?? "" }}</td>
                                                <td>{{ $university->region->name }}</td>
                                                <td><a href="{{ route('admin.editUniversity',$university->id) }}" class="btn btn-sm btn-warning">More</a></td>
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

@extends('employee.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Employee</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/employee')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Rating</li>
        </ol>
        <div class="container-fluid pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    @if(!$hasEmployee)
                        <h3 class="text-center text-warning">{{'No Employee Is available for rating'}}</h3>
                   @else
                        <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                        <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Employee Rating</h4>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'employee-submit-task-report','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            <div class="form-group row">
                                {{Form::label('task_name','Task',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('task_name',$task->task_official_id.' , '.$task->task_name,['class'=>'form-control','readonly'])}}
                                    {{Form::hidden('task_id',$task->id)}}
                                    <span class="text-danger">{{$errors->has('task_name')? $errors->first('task_name'):''}}</span>

                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('employee_id','Employee',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="employee_id" required>
                                        <option value="" disabled selected>{{'-- Select Co-worker --'}}</option>
                                        @foreach($assignTaskDetails as $assignTaskDetails)
                                            <option value="{{$assignTaskDetails->id}}">{{$assignTaskDetails->employee_official_id.' , '.$assignTaskDetails->first_name.'  '.$assignTaskDetails->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->has('employee_id')? $errors->first('employee_id'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('rating_point','Rating Point',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="rating_point" required>
                                        <option value="" disabled selected>{{'-- Select Point --'}}</option>
                                            <option value="{{1}}">{{1}}</option>
                                            <option value="{{2}}">{{2}}</option>
                                            <option value="{{3}}">{{3}}</option>
                                            <option value="{{4}}">{{4}}</option>
                                            <option value="{{5}}">{{5}}</option>
                                    </select>
                                    <span class="text-danger">{{$errors->has('employee_id')? $errors->first('employee_id'):''}}</span>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Submit',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection

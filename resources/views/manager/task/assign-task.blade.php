@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-success">Task Assign</h4>
                        </div>
                        <div class="card-body">

                            {{ Form::open(['route'=>'assign-new-task','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            <div class="form-group row">
                                {{Form::label('task_id','Task',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('task_id',$task->task_official_id.' , '.$task->task_name,['class'=>'form-control','readonly'])}}
                                    {{Form::hidden('task_id',$task->id.' , '.$task->task_name,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('employee_id','Employee',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                   <select class="form-control" name="employee_id" required>
                                            <option value="" disabled selected>{{'-- Select Employee --'}}</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->employee_official_id.' , '.$employee->first_name.' '.$employee->last_name}}</option>
                                            @endforeach
                                        </select>
                                    <span class="text-danger">{{$errors->has('employee_id')? $errors->first('employee_id'):''}}</span>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Assign',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

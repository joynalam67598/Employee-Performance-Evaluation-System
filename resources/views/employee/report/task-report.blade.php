@extends('employee.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Employee</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/employee')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Report</li>
        </ol>
        <div class="container-fluid pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Report Submission</h4>
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
                                {{Form::label('stage_no','Stage No',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="stage_no" required>
                                        <option value="" disabled selected>{{'-- Select Stage NO. --'}}</option>
                                        @for($i=1;$i<=$task->number_of_stage;$i++)
                                            <option value={{$i}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <span class="text-danger">{{$errors->has('stage_no')? $errors->first('stage_no'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('report_file','Report File',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::file('report_file',['accept'=>'image/*','required'])}}
                                </div>
                            </div>
                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Submit',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection

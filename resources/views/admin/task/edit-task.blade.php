@extends('admin.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Task Edit</h4>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'update-task','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'editTaskForm']) }}
                            <div class="form-group row">
                                {{Form::label('department_id','Department',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="department_id" required>
                                        <option value="" disabled selected>{{'-- Select Department --'}}</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->has('department_id')? $errors->first('department_id'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('manager_id','Manager',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="manager_id" id="manager_id" >
                                        @foreach($managers as $manager)
                                            <option value="{{$manager->id}}">{{$manager->manager_official_id.' , '.$manager->first_name.' '.$manager->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->has('manager_id')? $errors->first('manager_id'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('task_official_id','ID',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('task_official_id',$task->task_official_id,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('task_name','Task Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('task_name',$task->task_name,['class'=>'form-control','required'])}}
                                    {{Form::hidden('task_id',$task->id)}}
                                    <span class="text-danger">{{$errors->has('task_name')? $errors->first('task_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('days_to_complete','Days To Complete',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::number('days_to_complete',$task->days_to_complete,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('days_to_complete')? $errors->first('days_to_complete'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('number_of_stage','Number of Stage',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::number('number_of_stage',$task->number_of_stage,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('number_of_stage')? $errors->first('number_of_stage'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('task_deadline','Deadline',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('task_deadline',$task->task_deadline, ['class' => 'form-control ','required','id' => 'taskDate']) }}
                                    <span class="text-danger">{{$errors->has('task_deadline')? $errors->first('task_deadline'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('task_description','Task Description',['class'=>'col-sm-3','required'])}}
                                <div class="col-sm-9">
                                    {{Form::textarea('task_description',$task->task_description,['class'=>'form-control','rows'=>'10','id'=>'editor'])}}
                                    <span class="text-danger">{{$errors->has('task_description')? $errors->first('task_description'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('task_file','Task File',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">

                                    <iframe src="{{url('admin/task-files/'.$task->task_file)}}" height="300px" width="100%" ></iframe>
                                    {{Form::file('task_file')}}
                                    <span class="text-danger">{{$errors->has('task_file')? $errors->first('task_file'):''}}</span>
                                </div>
                            </div>

                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Update',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.forms['editTaskForm'].elements['department_id'].value = '{{$task->department_id}}';
        document.forms['editTaskForm'].elements['manager_id'].value = '{{$task->manager_id}}';
    </script>

@endsection

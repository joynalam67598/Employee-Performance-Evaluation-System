@extends('admin.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Department</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Department Info</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <h4 class="text-center text-success" id="message">{{Session::get('message')}}</h4>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Add Department</h4>
                        </div>
                        <div class="card-body">
                            {{Form::open(['route'=>'new-department','method'=>'post','class'=>'form-horizontal']) }}
                            <div class="form-group row">
                                {{Form::label('department_name','Depatment',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('department_name','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('department_name')? $errors->first('department_name'):''}}</span>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Save',['class'=>'btn btn-block btn-primary form-control'])}}
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

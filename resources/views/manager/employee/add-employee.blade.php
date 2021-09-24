@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Employee</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Employee Info</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Add Employee</h4>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'new-employee','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            {{Form::hidden('department_id',$department->id,['class'=>'col-sm-3'])}}
                            {{Form::hidden('manager_id',$managerId,['class'=>'col-sm-3'])}}

{{--                            <div class="form-group row">--}}
{{--                                {{Form::label('department_id','Department',['class'=>'col-sm-3'])}}--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <select class="form-control" name="department_id" required>--}}
{{--                                        <option value="" disabled selected>{{'-- Select Department --'}}</option>--}}
{{--                                        @foreach($departments as $department)--}}
{{--                                            <option value="{{$department->id}}">{{$department->department_name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    <span class="text-danger">{{$errors->has('department_id')? $errors->first('department_id'):''}}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                {{Form::label('manager_id','Manager',['class'=>'col-sm-3'])}}--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <select class="form-control" name="manager_id" id="manager_id" >--}}
{{--                                        <option value="" selected disabled >{{'-- Select Manager --'}}</option>--}}
{{--                                    </select>--}}
{{--                                    <span class="text-danger">{{$errors->has('manager_id')? $errors->first('manager_id'):''}}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                {{Form::label('employee_official_id','ID',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('employee_official_id','EMP-20'.rand(100000,999999),['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('first_name','First Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('first_name','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('last_name','Last Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('last_name','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('email','Email',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::email('email','',['class'=>'form-control','placeholder'=>'Enter Email','required'])}}
                                    <span class="text-danger">{{$errors->has('email')? $errors->first('email'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('phone_number','Phone Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('phone_number','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('gender','Gender',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender" required>
                                        <option value="" disabled selected>{{'-- Select Gender --'}}</option>
                                        <option value="male">{{"Male"}}</option>
                                        <option value="female">{{"Female"}}</option>
                                        <option value="other">{{"Other"}}</option>
                                    </select>
                                    <span class="text-danger">{{$errors->has('gender')? $errors->first('gender'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('date_of_birth','Date of Birth',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('date_of_birth',\Carbon\Carbon::today()->toDateString(), ['class' => 'form-control ','required','id' => 'date']) }}
                                    <span class="text-danger">{{$errors->has('date_of_birth')? $errors->first('date_of_birth'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('qualification','Qualification',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('qualification','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('qualification')? $errors->first('qualification'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('employee_salary','Salary Per Month',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::number('employee_salary','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('employee_salary')? $errors->first('employee_salary'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('employee_account_number','Account Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('employee_account_number','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('employee_account_number')? $errors->first('employee_account_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('address','Address',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::textarea('address','',['class'=>'form-control','rows'=>'3','required'])}}
                                    <span class="text-danger">{{$errors->has('address')? $errors->first('address'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('user_name','Username',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('user_name','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('user_name')? $errors->first('user_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('password','Password',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('password','',['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('employee_image','Image',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::file('employee_image',['accept'=>'image/*','required'])}}
                                    <span class="text-danger">{{$errors->has('employee_image')? $errors->first('employee_image'):''}}</span>
                                </div>
                            </div>

                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Save',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection

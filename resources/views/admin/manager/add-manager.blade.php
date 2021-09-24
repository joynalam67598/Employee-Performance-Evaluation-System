@extends('admin.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Manager</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manager Info</li>
        </ol>
    <div class="container pb-lg-5">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-primary">Add Manager</h4>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route'=>'new-manager','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                            {{Form::label('manager_official_id','ID',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('manager_official_id','MNR-00'.rand(10000,99999),['class'=>'form-control','readonly'])}}
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
                            {{Form::label('manager_salary','Salary Per Month',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::number('manager_salary','',['class'=>'form-control','required'])}}
                                <span class="text-danger">{{$errors->has('manager_salary')? $errors->first('manager_salary'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('manager_account_number','Account Number',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('manager_account_number','',['class'=>'form-control','required'])}}
                                <span class="text-danger">{{$errors->has('manager_account_number')? $errors->first('manager_account_number'):''}}</span>
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
                            {{Form::label('manager_image','Image',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::file('manager_image',['accept'=>'image/*','required'])}}
                                <span class="text-danger">{{$errors->has('manager_image')? $errors->first('manager_image'):''}}</span>
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

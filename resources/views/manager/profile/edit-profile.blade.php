@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Manager</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">Manager Info</h4>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'update-manger-info','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            <div class="form-group row">
                                {{Form::label('department_id','Department',['class'=>'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::text('department_name',$department->department_name,['class'=>'form-control','readonly'])}}
                                        {{Form::hidden('department_id',$department->id)}}
                                        {{Form::hidden('manager_id',$manager->id)}}
                                    </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('first_name','First Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('first_name',$manager->first_name,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('last_name','Last Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('last_name',$manager->last_name,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('manager_official_id','ID',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('manager_official_id',$manager->manager_official_id,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('email','Email',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::email('email',$manager->email,['class'=>'form-control','required','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('phone_number','Phone Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('phone_number',$manager->phone_number,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('gender','Gender',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::hidden('gender',$manager->gender)}}

                                    @if($manager->gender == 'male')
                                        {{Form::text('manager_gender','Male',['class'=>'form-control','readonly'])}}
                                    @elseif($manager->gender == 'female')
                                        {{Form::text('manager_gender','Female',['class'=>'form-control','readonly'])}}
                                    @else
                                        {{Form::text('manager_gender','Other',['class'=>'form-control','readonly'])}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('date_of_birth','Date of Birth',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('date_of_birth',$manager->date_of_birth, ['class' => 'form-control ','required','id' => 'date']) }}
                                    <span class="text-danger">{{$errors->has('date_of_birth')? $errors->first('date_of_birth'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('qualification','Qualification',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('qualification',$manager->qualification,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('manager_salary','Salary Per Month',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::number('manager_salary',$manager->manager_salary,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('manager_account_number','Account Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('manager_account_number',$manager->manager_account_number,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('manager_account_number')? $errors->first('manager_account_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('address','Address',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::textarea('address',$manager->address,['class'=>'form-control','rows'=>'3','required'])}}
                                    <span class="text-danger">{{$errors->has('address')? $errors->first('address'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('user_name','Username',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('user_name',$manager->user_name,['class'=>'form-control','readonly'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('manager_image','Image',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::file('manager_image',['accept'=>'image/*'])}}
                                    <img src="{{asset($manager->manager_image)}}" height="100px" width="100px" alt="">
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




@endsection

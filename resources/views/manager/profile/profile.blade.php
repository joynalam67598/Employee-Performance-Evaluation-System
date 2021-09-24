@extends('manager.master')
@section('content')

    <div class="container-fluid">
        <h3 class="mt-4">Manager</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
            <div class=" table-responsive">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-8">
                            <table class="table table-hover table-bordered table-sm">
                                <tr>
                                    <th>Name :</th>
                                    <td>{{$manager->first_name.' '.$manager->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>User Name :</th>
                                    <td>{{$manager->user_name}}</td>
                                </tr>
                                <tr>
                                    <th>Official ID :</th>
                                    <td>{{$manager->manager_official_id}}</td>
                                </tr>
                                <tr>
                                    <th>Department Name :</th>
                                    <td>{{$department->department_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$manager->email}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth :</th>
                                    <td>{{$manager->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <th>Account Number :</th>
                                    <td>{{$manager->manager_account_number}}</td>
                                </tr>
                                <tr>
                                    <th>Qualifiaction :</th>
                                    <td>{{$manager->qualification}}</td>
                                </tr>
                                <tr>
                                    <th>Registration Date :</th>
                                    <td>{{$manager->created_at}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4 text-center border">
                                <img height="200px" width="200px"  src="{{asset($manager->manager_image)}}" alt="">
                            <br>
                            <br>
                                <a href="{{route("edit-manager-profile")}}" class="btn btn-block btn-info">{{"Edit Profile"}}</a>
                            <br>
                            <div class="text-center">
                                <h5 class="text-center text-success" id="message">{{Session::get('message')}}</h5>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

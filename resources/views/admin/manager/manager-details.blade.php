@extends('admin.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Manager</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manager Details</li>
        </ol>
        <div class="container pb-lg-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="text-success">Manager Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th class="w-25">Manager Name :</th>
                                            <td>{{$manager->first_name.' '.$manager->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Manger ID :</th>
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
                                            <th>Phone Number :</th>
                                            <td>{{$manager->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth :</th>
                                            <td>{{$manager->date_of_birth}}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender :</th>
                                            <td>{{$manager->gender}}</td>
                                        </tr>
                                        <tr>
                                            <th>Salary Per Month :</th>
                                            <td>{{$manager->manager_salary}}</td>
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
                                        <tr>
                                            <th>User Name :</th>
                                            <td>{{$manager->user_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Password :</th>
                                            <td>{{$manager->password}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address :</th>
                                            <td>{{$manager->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Manager Image :</th>
                                            <td>
                                                <img src="{{asset($manager->manager_image)}}" height="100px" width="100px" alt="">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="float-right col-sm-2">
                                        <a href="{{route('manage-manager')}}" class="btn btn-block btn-success">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

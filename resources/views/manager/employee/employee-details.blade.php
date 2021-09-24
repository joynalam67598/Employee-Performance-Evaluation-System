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
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-success">Employee Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th class="w-25">Employee Name :</th>
                                        <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Employee ID :</th>
                                        <td>{{$employee->employee_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Department Name :</th>
                                        <td>{{$department->department_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manage Name :</th>
                                        <td>{{$manager->first_name.' '.$manager->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manager ID :</th>
                                        <td>{{$manager->manager_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{$employee->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number :</th>
                                        <td>{{$employee->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth :</th>
                                        <td>{{$employee->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender :</th>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Doing Work :</th>
                                        <td>{{3-$employee->employee_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Work Can Assign :</th>
                                        <td>{{$employee->employee_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary Per Month :</th>
                                        <td>{{$employee->employee_salary}}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number :</th>
                                        <td>{{$employee->employee_account_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Qualifiaction :</th>
                                        <td>{{$employee->qualification}}</td>
                                    </tr>
                                    <tr>
                                        <th>Registration Date :</th>
                                        <td>{{$employee->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>User Name :</th>
                                        <td>{{$employee->user_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Password :</th>
                                        <td>{{$employee->password}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{$employee->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Employee Image :</th>
                                        <td>
                                            <img src="{{asset($employee->employee_image)}}" height="100px" width="100px" alt="">
                                        </td>
                                    </tr>
                                </table>
                                <div class="float-right col-sm-2">
                                    <a href="{{route('manage-employee')}}" class="btn btn-block btn-success">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

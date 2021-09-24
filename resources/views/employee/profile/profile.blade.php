@extends('employee.master')
@section('content')

    <div class="container-fluid">
        <h3 class="mt-4">Employee</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/employee')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
            <div class=" table-responsive">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="row">
                        <div class="col-sm-9">
                            <table class="table table-hover table-bordered table-sm bg-white">
                                <tr>
                                    <th>Name :</th>
                                    <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Rating :</th>
                                @if($employee->rating<400)
                                        <td class="text-secondary" >{{$employee->rating}}</td>
                                @elseif($employee->rating>399 && $employee->rating<800)
                                        <td class="text-success">{{$employee->rating}}</td>
                                @elseif($employee->rating>799 && $employee->rating<1100)
                                        <td  class="text-info">{{$employee->rating}}</td>
                                @elseif($employee->rating>1099 && $employee->rating<1500)
                                    <td class="text-warning">{{$employee->rating}}</td>
                                @elseif($employee->rating>1499)
                                        <td class="text-danger">{{$employee->rating}}</td>
                                @endif
                                </tr>
                                <tr>
                                    <th>Designation :</th>
                                    @if($employee->rating<400)
                                        <td class="text-secondary" >{{"Employee"}}</td>
                                    @elseif($employee->rating>399 && $employee->rating<800)
                                        <td class="text-success">{{"Special Events Coordinator"}}</td>
                                    @elseif($employee->rating>799 && $employee->rating<1100)
                                        <td  class="text-info">{{"Senior Support Assistant"}}</td>
                                    @elseif($employee->rating>1099 && $employee->rating<1500)
                                        <td class="text-warning">{{"Senior Executive Assistant"}}</td>
                                    @elseif($employee->rating>1499)
                                        <td class="text-danger">{{"Secretary"}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>User Name :</th>
                                    <td>{{$employee->user_name}}</td>
                                </tr>
                                <tr>
                                    <th>Official ID :</th>
                                    <td>{{$employee->employee_official_id}}</td>
                                </tr>
                                <tr>
                                    <th>Department Name :</th>
                                    <td>{{$department->department_name}}</td>
                                </tr>
                                <tr>
                                    <th>Manager :</th>
                                    <td>{{$manager->manager_official_id.' , '.$manager->first_name.' '.$manager->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth :</th>
                                    <td>{{$employee->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <th>Account Number :</th>
                                    <td>{{$employee->employee_account_number}}</td>
                                </tr>
                                <tr>
                                    <th>Salary :</th>
                                    <td>{{$employee->employee_salary}} Taka</td>
                                </tr>
                                <tr>
                                    <th>Qualifiaction :</th>
                                    <td>{{$employee->qualification}}</td>
                                </tr>
                                <tr>
                                    <th>Joining Date :</th>
                                    <td>{{$employee->created_at}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-3 text-center border bg-white">
                                <img height="200px" width="100%"  src="{{asset($employee->employee_image)}}" alt="">
                            <br>
                            <br>
                                <a href="{{route("edit-employee-profile")}}" class="btn btn-block btn-info">{{"Edit Profile"}}</a>

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

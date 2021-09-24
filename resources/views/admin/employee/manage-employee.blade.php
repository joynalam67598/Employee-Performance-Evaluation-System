@extends('admin.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Employee</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Employee Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Employees Table</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager ID</th>
                                        <th>Employee Name</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager ID</th>
                                        <th>Employee Name</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$employee->department_name}}</td>
                                            <td>{{$employee->manager_official_id}}</td>
                                            <td>{{$employee->first_name." ".$employee->last_name}}</td>
                                            <td>{{$employee->employee_official_id}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->phone_number}}</td>
                                            <td>
                                                <a href="{{route('view-employee-details',['id'=>$employee->id])}}" class="btn btn-success btn-xs" title="View Details">
                                                    <span class="fa fa-search-plus"></span>
                                                </a>
                                                <a  href="{{route('delete-employee',['id'=>$employee->id])}}" class="btn btn-danger btn-xs" title="Delete">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection


@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Rating</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Rating Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Employees Rating Table</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Name </th>
                                        <th>ID</th>
                                        <th>Work Done</th>
                                        <th>Rating</th>
                                        <th>Designation</th>
                                        <th>Joining Date</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Name </th>
                                        <th>ID</th>
                                        <th>Work Done</th>
                                        <th>Rating</th>
                                        <th>Designation</th>
                                        <th>Joining Date</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($employees as $employee)
                                        <label hidden>
                                            @php($totalTask=0)
                                            @foreach($totalWorks as $totalWork)
                                                @if($totalWork->id == $employee->id)
                                                    {{$totalTask++}}
                                                @endif
                                            @endforeach
                                        </label>
                                        @if($employee->rating<400)
                                            <tr class="text-secondary">
                                                <td>{{$i++}}</td>
                                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                <td>{{$employee->employee_official_id}}</td>
                                                <td>{{$totalTask}}</td>
                                                <td >{{$employee->rating}}</td>
                                                <td >{{"Employee"}}</td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                        @elseif($employee->rating>399 && $employee->rating<800)
                                            <tr class="text-success">
                                                <td>{{$i++}}</td>
                                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                <td>{{$employee->employee_official_id}}</td>
                                                <td>{{$totalTask}}</td>
                                                <td >{{$employee->rating}}</td>
                                                <td >{{"Special Events Coordinator"}}</td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                        @elseif($employee->rating>799 && $employee->rating<1100)
                                            <tr class="text-info">
                                                <td>{{$i++}}</td>
                                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                <td>{{$employee->employee_official_id}}</td>
                                                <td>{{$totalTask}}</td>
                                                <td >{{$employee->rating}}</td>
                                                <td >{{"Senior Support Assistant"}}</td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                        @elseif($employee->rating>1099 && $employee->rating<1500)
                                            <tr class="text-warning">
                                                <td>{{$i++}}</td>
                                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                <td>{{$employee->employee_official_id}}</td>
                                                <td>{{$totalTask}}</td>
                                                <td >{{$employee->rating}}</td>
                                                <td >{{"Senior Executive Assistant"}}</td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                        @elseif($employee->rating>1499)
                                            <tr class="text-danger">
                                                <td>{{$i++}}</td>
                                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                <td>{{$employee->employee_official_id}}</td>
                                                <td>{{$totalTask}}</td>
                                                <td >{{$employee->rating}}</td>
                                                <td>{{"Secretary"}}</td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                            @endif
                                            </td>
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


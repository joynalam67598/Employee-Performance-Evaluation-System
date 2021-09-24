@extends('admin.master');

@section('content')

    <div class="container-fluid">
        <h3>Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Tasks Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager Name</th>
                                        <th>Manager ID</th>
                                        <th>Task Name</th>
                                        <th>Task ID</th>
                                        <th>Task Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager Name</th>
                                        <th>Manager ID</th>
                                        <th>Task Name</th>
                                        <th>Task ID</th>
                                        <th>Task Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($tasks as $task)

                                        <tr @if($task->task_status=="submitted") class="text-success" @else  class="text-danger" @endif>
                                            <td>{{$i++}}</td>
                                            <td>{{$task->department_name}}</td>
                                            <td>{{$task->first_name." ".$task->last_name}}</td>
                                            <td>{{$task->manager_official_id}}</td>
                                            <td>{{$task->task_name}}</td>
                                            <td>{{$task->task_official_id}}</td>
                                            <td>{{$task->task_status=="submitted" ?  "Completed" : "Pending" }}</td>
                                            <td>
                                                <a href="{{route('view-task-details',['id'=>$task->id])}}" class="btn btn-warning btn-xs" title="View Details">
                                                    <span class="fa fa-search-plus"></span>
                                                </a>
                                                @if($task->task_status!="submitted")
                                                    <a href="{{route('edit-task',['id'=>$task->id])}}" class="btn btn-dark btn-xs" title="Edit">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a href="" class="btn btn-secondary btn-xs" title="No report submitted" onclick="return false">
                                                        <span class="fa fa-book"></span>
                                                    </a>
                                                @else
                                                    <a href="" class="btn btn-success btn-xs" title="Completed" onclick="return false">
                                                        <span class="fa fa-check"></span>
                                                    </a>
                                                    <a href="{{route('show-task-report',['id'=>$task->id])}}" class="btn btn-primary btn-xs" title="view report">
                                                        <span class="fa fa-book"></span>
                                                    </a>
                                                @endif

                                                <a  href="" class="btn btn-danger btn-xs" title="Delete">
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


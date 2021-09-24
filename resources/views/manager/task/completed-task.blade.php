@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Completed Tasks Table</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Task Title</th>
                                        <th>Task ID</th>
                                        <th>Assigned To</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Task Title</th>
                                        <th>Task ID</th>
                                        <th>Assigned To</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$task->task_name}}</td>
                                            <td>{{$task->task_official_id}}</td>
                                            <td>{{$task->employee_official_id.' , '.$task->first_name.' '.$task->last_name}}</td>
                                            <td>{{$task->task_deadline}}</td>
                                            <td>
                                                <a href="{{route('manager-view-pending-task-details',['id'=>$task->id])}}" class="btn btn-success btn-xs" title="View Details">
                                                    <span class="fa fa-search-plus"></span>
                                                </a>
                                                <a href="{{route('show-task-report',['id'=>$task->id])}}" class="btn btn-primary btn-xs" title="view report">
                                                    <span class="fa fa-book"></span>
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


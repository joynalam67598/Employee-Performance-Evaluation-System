@extends('employee.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/employee')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Complete Tasks Table</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive ">
                                <table class="table table-hover table-striped table-bordered text-center">
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Task Title</th>
                                        <th>Task ID</th>
                                        <th>Stages</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                    @php($i=1)
                                    @foreach($completeTasks as $completeTask)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$completeTask->task_name}}</td>
                                            <td>{{$completeTask->task_official_id}}</td>
                                            <td>{{$completeTask->number_of_stage}}</td>
                                            <td>{{$completeTask->task_deadline}}</td>
                                            <td>
                                                <a href="{{route('employee-view-completed-task-details',['id'=>$completeTask->id])}}" class="btn btn-info btn-xs" title="View Details">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection


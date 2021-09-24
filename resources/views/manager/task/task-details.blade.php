@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">Task</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Info</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-success">Task Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th class="w-25">Task Title:</th>
                                        <td>{{$task->task_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Task ID:</th>
                                        <td>{{$task->task_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Department Name:</th>
                                        <td>{{$department->department_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manager Name:</th>
                                        <td>{{$manager->first_name.' '.$manager->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manger ID:</th>
                                        <td>{{$manager->manager_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Days to Complete:</th>
                                        <td>{{$task->days_to_complete}}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Stage:</th>
                                        <td>{{$task->number_of_stage}}</td>
                                    </tr>
                                    <tr>
                                        <th>Deadline:</th>
                                        <td>{{$task->task_deadline}}</td>
                                    </tr>
                                    <tr>
                                        <th>Task Description:</th>
                                        <td>{!! $task->task_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Task File:</th>
                                        <td>{{$task->task_file}}
                                            <div class="float-right">
                                                <a href="{{route('view-task-file',['id'=>$task->id])}}" class="btn btn-warning btn-xs" title="View file">
                                                <span class="fa fa-eye"></span>
                                                </a>
                                                <a href="{{route('download-task-file',['file'=>$task->task_file])}}" class="btn btn-info btn-xs" title="Download file">
                                                    <span class="fa fa-download"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="float-right col-sm-2">
                                    <a href="{{route('manager-show-new-task')}}" class="btn btn-block btn-success">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

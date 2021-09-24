@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 >Report</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Task Report</li>
        </ol>
        <div class="container-fluid pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-success">Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    @foreach($reports as $report)
                                    <tr>
                                        <th>Stage : {{$report->stage_no}}</th>
                                        <td>{{$report->report_file}}
                                            <div class="float-right">
                                                <a href="{{route('view-task-report',['id'=>$report->id])}}" class="btn btn-warning btn-xs" title="View file">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                                <a href="{{route('download-task-file',['file'=>$report->report_file])}}" class="btn btn-info btn-xs" title="Download file">
                                                    <span class="fa fa-download"></span>
                                                </a>
                                            </div>
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

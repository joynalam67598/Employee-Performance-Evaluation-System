@extends('admin.master');
@section('content')
    <table>
        <tr>
            <td><iframe src="{{url('admin/report-files/'.$report->report_file)}}" height="625px" width="100%" ></iframe></td>
        </tr>
    </table>
@endsection

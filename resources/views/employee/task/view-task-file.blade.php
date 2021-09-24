@extends('employee.master');
@section('content')
    <table>
        <tr>
            <td><iframe src="{{url('admin/task-files/'.$task->task_file)}}" height="625px" width="100%" ></iframe></td>
        </tr>
    </table>
@endsection

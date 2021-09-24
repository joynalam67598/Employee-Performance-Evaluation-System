@extends('admin.master');
@section('content')
    <table>
        <tr>
            <td><iframe src="{{url($task->task_file}}" height="625px" width="100%" ></iframe></td>
        </tr>
    </table>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\AssignTask;
use App\Models\Employee;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;
use Session;

class ReportController extends Controller
{

// ---Shared---

    public function showTaskReport($id)
    {
        if (Session::get('userType') == 'manager') {
            $reports = Report::where('task_id', '=', $id)->get();
            return view('manager.report.view-task-report', [
                'reports' => $reports
            ]);
        }
        else
        {
            $reports = Report::where('task_id', '=', $id)->get();
            return view('admin.report.view-task-report', [
                'reports' => $reports
            ]);

        }


    }

// ----------------Manager-------------



// ----------------Employee------------


    public function showTaskReportToEmployee($id)
    {
        $task = Task::find($id);
        return view('employee.report.task-report',[
            'task'=>$task
        ]);
    }
    protected function uploadReportFile($request,$task){

        $employeeId = Session::get('userId');
        $employee = Employee::find($employeeId);
        $file = $request->file('report_file') ;
        $filetype = $file->getClientOriginalExtension() ;
        $fileName = $employee->employee_official_id.' '.$task->task_official_id.'-'.$request->stage_no.'.'.$filetype ;
        $destinationPath = 'admin/report-files/' ;
        $file->move($destinationPath,$fileName);
        return $fileName ;

    }


    public function submitTaskReportByEmployee(Request $request)
    {
        $taskId = $request->task_id;
        $task = Task::find($taskId);
        $employeeId = Session::get('userId');
        $report = new Report();
        $report->department_id = $task->department_id;
        $report->task_id = $taskId;
        $report->manager_id = $task->manager_id;
        $report->employee_id = $employeeId;
        $report->stage_no = $request->stage_no;
        $fileName = $this->uploadReportFile($request,$task);
        $report->report_file = $fileName;
        $report->save();
        return redirect('/employee/new-task')->with('message','Report submitted successfully!');

    }
    public function showReportFile($id)
    {
        if(Session::get('userType')=='manager')
        {
            $report= Report::find($id);
            return view('manager.report.view-report-file',[
                'report'=>$report
            ]);
        }
        else if(Session::get('userType')=='employee')
        {
            $report= Report::find($id);
            return view('employee.report.view-report-file',[
                'report'=>$report
            ]);
        }
            $report= Report::find($id);
            return view('admin.report.view-report-file',[
                'report'=>$report
            ]);
    }


}

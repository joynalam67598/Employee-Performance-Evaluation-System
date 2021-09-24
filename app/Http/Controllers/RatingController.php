<?php

namespace App\Http\Controllers;

use App\Models\AssignTask;
use App\Models\Employee;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;
use DB;
use Session;

class RatingController extends Controller
{
//    public function showCoWorkerRating()
//    {
//        $employeeId = Session::get('userId');
//        $assignTask = AssignTask::where('employee_id','=',$employeeId)
//                                ->where('report_status','=',1)
//                                ->where('rating_status','=',0)
//                                ->first();
//
//        if($assignTask)
//        {
//            $task = Task::find($assignTask->task_id);
//            $hasEmployee = AssignTask::where('task_id','=',$assignTask->task_id)
//                ->where('employee_id','!=',$employeeId)
//                ->where('rating_status','=',0)
//                ->where('report_status','=',1)
//                ->get();
//            $assignTaskDetails = DB::table('assign_tasks')
//                ->where('assign_tasks.task_id','=',$assignTask->task_id)
//                ->where('assign_tasks.employee_id','!=',$employeeId)
//                ->where('assign_tasks.rating_status','=',0)
//                ->join('employees','assign_tasks.employee_id','=','employees.id')
//                ->select('assign_tasks.report_status','employees.*')
//                ->get();
//
//            if(count($hasEmployee) ) $hasEmployee=1;
//            else $hasEmployee = 0;
//
//            return view('employee.rating.co-worker-rating',[
//                'hasEmployee'=>$hasEmployee,
//                'task'=>$task,
//                'assignTaskDetails'=>$assignTaskDetails
//            ]);
//        }
//        $hasEmployee = 0;
//        return view('employee.rating.co-worker-rating',[
//            'hasEmployee'=>$hasEmployee
//        ]);
//
//
//
//    }
    public function showGiveRatingToManager($id)
    {
        $managerId = Session::get('userId');
        $unratedEmployee = AssignTask::where('task_id','=',$id)
            ->where('manager_id','=',$managerId)
            ->where('rating_status','=',0)
            ->where('manager_rating_status','=',0)
            ->first();

        if($unratedEmployee)
        {
            $task = Task::find($id);
            $employee = Employee::find($unratedEmployee->employee_id);
            $hasEmployee=1;

            return view('manager.rating.employee-rating-submit',[
                'hasEmployee'=>$hasEmployee,
                'task'=>$task,
                'employee'=>$employee
            ]);
        }
        $hasEmployee = 0;
        return view('manager.rating.employee-rating-submit',[
            'hasEmployee'=>$hasEmployee
        ]);
    }

    public function submitRatingByManager(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->task_status = 'submitted';


        $employee = Employee::find($request->employee_id);
        $employee->rating += $request->rating_point;


        $assignTask = AssignTask::where('task_id','=',$request->task_id)
             ->where('employee_id','=',$request->employee_id)
             ->first();

        $assignTask->rating_status = 1;
        $assignTask->manager_rating_status = 1;

        $assignTask->save();
        $task->save();
        $employee->save();

        return redirect('/manager/show/submitted-task')->with('message','Rating given sucssesfully');
    }

    public function showEmployeeRating()
    {

        if (Session::get('userType') == 'manager') {

            $managerId = Session::get('userId');
            $employees = Employee::where('manager_id','=',$managerId)->get();
            $totalWorks = DB::table('assign_tasks')
                ->where('assign_tasks.manager_id','=',$managerId)
                ->where('assign_tasks.rating_status','=',1)
                ->where('assign_tasks.report_status','=',1)
                ->where('assign_tasks.manager_rating_status','=',1)
                ->join('employees','assign_tasks.employee_id','=','employees.id')
                ->select('employees.id')->get();

            return view('manager.rating.employees-rating',[
                'employees'=>$employees,
                'totalWorks'=>$totalWorks
            ]);
        }
        else
        {
            $employees = Employee::all();
            $totalWorks = DB::table('assign_tasks')
                ->where('assign_tasks.rating_status','=',1)
                ->where('assign_tasks.report_status','=',1)
                ->where('assign_tasks.manager_rating_status','=',1)
                ->join('employees','assign_tasks.employee_id','=','employees.id')
                ->select('employees.id')->get();

            return view('admin.rating.employees-rating',[
                'employees'=>$employees,
                'totalWorks'=>$totalWorks
            ]);

        }

    }
}

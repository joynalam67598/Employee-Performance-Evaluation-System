<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\AssignTask;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Report;
use App\Models\Task;
use File;
use Illuminate\Http\Request;
use DB;
use Session;

class TaskController extends Controller
{
    public function showAddTask()
    {
        $departments = Department::all();
        return view("admin.task.add-task",[
            'departments'=>$departments
        ]);
    }
    public function showManageTask()
    {

        $tasks = DB::table('tasks')
            ->join('departments','departments.id','=','tasks.department_id')
            ->join('managers','managers.id','=','tasks.manager_id')
            ->select('tasks.*','departments.department_name','managers.first_name','managers.last_name',
                'managers.manager_official_id',)
            ->get();

        return view("admin.task.manage-task",[
            'tasks'=>$tasks
            ]);
    }
    public function getManagers($id){
        $managers = Manager::where('department_id',$id)->get();
        return response()->json($managers);
    }

    protected function uploadTaskFile($request){
        $file = $request->file('task_file') ;
        $filetype = $file->getClientOriginalExtension() ;
        $fileName = $request->task_name.'.'.$filetype ;
        $destinationPath = 'admin/task-files/' ;
        $file->move($destinationPath,$fileName);
//        $fileUrl = $destinationPath.$fileName;
        return $fileName ;

    }

    public function saveTask(Task $task,SaveTaskRequest $request)
    {

        $task->department_id = $request->department_id;
        $task->manager_id = $request->manager_id;
        $task->task_name = $request->task_name;
        $task->task_official_id = $request->task_official_id;
        $task->days_to_complete = $request->days_to_complete;
        $task->task_deadline = $request->task_deadline;
        $task->number_of_stage = $request->number_of_stage;
        $task->task_description = $request->task_description;
        if($file = $request->hasFile('task_file')) {
            $fileName = $this->uploadTaskFile($request);
            $task->task_file = $fileName;
        }
       $task->save();

        return redirect('/task/add')->with('message','Task added successfully!!');

    }
    public function showTaskDetails($id)
    {
        $task = Task::find($id);
        $manager = Manager::where('id','=',$task->manager_id)->first();
        $department = Department::where('id','=',$task->department_id)->first();
        return view('admin.task.task-details',[
            'task'=>$task,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function showTaskFile($id)
    {
        if(Session::get('userType')=='manager')
        {
            $task= Task::find($id);
            return view('manager.task.view-task-file',[
                'task'=>$task
            ]);
        }
        else if(Session::get('userType')=='employee')
        {
            $task= Task::find($id);
            return view('employee.task.view-task-file',[
                'task'=>$task
            ]);
        }
        else
        {
            $task= Task::find($id);
            return view('admin.task.view-task-file',[
                'task'=>$task
            ]);
        }

    }
    public function downloadTaskFile($file)
    {
         return response()->download('admin/task-files/'.$file);
    }
    public function showEditTask($id)
    {
        $task = Task::find($id);
        $departments = Department::all();
        $managers = Manager::where('id','=',$task->manager_id)->get();
         return view('admin.task.edit-task',
         [
             'task'=> $task,
             'departments'=>$departments,
             'managers'=>$managers
         ]);
    }

    public function updateTask(UpdateTaskRequest $request)
    {
        $task = Task::find($request->task_id);
        $task->department_id = $request->department_id;
        $task->manager_id = $request->manager_id;
        $task->task_name = $request->task_name;
        $task->days_to_complete = $request->days_to_complete;
        $task->task_deadline = $request->task_deadline;
        $task->number_of_stage = $request->number_of_stage;
        $task->task_description = $request->task_description;
        if($file = $request->hasFile('task_file')) {
            $taskUrl = '/admin/task-files/'.$task->task_file;
            if(File::exists($taskUrl))
            {
                unlink($taskUrl);
            }
            $fileName = $this->uploadTaskFile($request);
            $task->task_file = $fileName;
        }
        $task->save();

        return redirect('/task/manage')->with('message','Task updated successfully!!');

    }


    //      Manager

    public function showNewTask()
    {
        $managerId = Session::get('userId');
        $tasks = Task::where('task_status','=','new')
                     ->where('manager_id','=',$managerId)
                     ->get();
        return view('manager.task.new-task',[
            'tasks'=>$tasks
        ]);
    }
    public function showTaskDetailsToManager($id)
    {
        $task = Task::find($id);
        $manager = Manager::where('id','=',$task->manager_id)->first();
        $department = Department::where('id','=',$task->department_id)->first();
        return view('manager.task.task-details',[
            'task'=>$task,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function showTaskAssignByManager($id)
    {
        $managerId = Session::get('userId');
        $task = Task::find($id);
        $employees = DB::table('employees')
                         ->where('manager_id','=',$managerId)
                         ->where('employee_status','=',1)
                         ->get();

        return view('manager.task.assign-task',[
            'task'=>$task,
            'employees' => $employees
        ]);
    }

    public function AssignNewTaskToEmployee(Request $request)
    {
        $taskId = $request->task_id;
        $employeeId = $request->employee_id;
        $task = Task::find($taskId);
        $employee = Employee::find($employeeId);

        $assignTask = new AssignTask();
        $assignTask->department_id = $task->department_id;
        $assignTask->manager_id = $task->manager_id;
        $assignTask->task_id = $task->id;
        $assignTask->employee_id = $request->employee_id;
        $assignTask->save();

        $task->task_status = 'pending';
        $task->save();

        $employee->employee_status = 0;
        $employee->save();


        return redirect('/manager/new-task')->with('message','Task assign successfully');


    }

    public function showPendingTaskToManager()
    {
        $managerId = Session::get('userId');
//        $tasks = DB::table('assign_tasks')
//            ->where('assign_tasks.manager_id','=',$managerId)
//            ->where('assign_tasks.report_status','=',0)
//            ->where('assign_tasks.rating_status','=',0)
//            ->join('tasks','tasks.id','=','assign_tasks.task_id')
//            ->join('employees','employees.id','=','assign_tasks.employee_id')
//            ->select('tasks.id','tasks.task_name','tasks.task_official_id','tasks.task_deadline'
//                ,'employees.first_name','employees.last_name','employees.employee_official_id')
//            ->get();
        $tasks = DB::table('assign_tasks')
            ->where('assign_tasks.manager_id','=',$managerId)
            ->where('assign_tasks.report_status','=',0)
            ->where('assign_tasks.rating_status','=',0)
            ->join('tasks','tasks.id','=','assign_tasks.task_id')
            ->join('employees','employees.id','=','assign_tasks.employee_id')
            ->select('tasks.id','tasks.task_name','tasks.task_official_id','tasks.task_deadline'
                ,'employees.first_name','employees.last_name','employees.employee_official_id')
            ->get();
        return view('manager.task.pending-task',[
            'tasks'=>$tasks
        ]);
    }

    public function showPendingTaskDetailsToManager($id)
    {
        $task = Task::find($id);
        $assignTask = DB::table('assign_tasks')
            ->where('assign_tasks.task_id','=',$id)
            ->join('employees','assign_tasks.employee_id','=','employees.id')
            ->select('assign_tasks.*','employees.*')
            ->first();

        return view('manager.task.pending-task-details',[
            'task'=>$task,
            'assignTask'=>$assignTask
        ]);

    }


    public function showSubmittedTaskToManager()
    {
        $managerId = Session::get('userId');
        $tasks = DB::table('assign_tasks')
            ->where('assign_tasks.manager_id','=',$managerId)
            ->where('assign_tasks.manager_rating_status','=',0)
            ->where('assign_tasks.report_status','=',1)
            ->join('tasks','tasks.id','=','assign_tasks.task_id')
            ->join('employees','employees.id','=','assign_tasks.employee_id')
            ->select('tasks.id','tasks.task_name','tasks.task_official_id','tasks.task_deadline'
                ,'employees.first_name','employees.last_name','employees.employee_official_id')
            ->get();
        return view('manager.task.submitted-task',[
            'tasks'=>$tasks
        ]);
    }

     public function showCompletedTaskToManager()
        {
            $managerId = Session::get('userId');
            $tasks = DB::table('assign_tasks')
                ->where('assign_tasks.manager_id','=',$managerId)
                ->where('assign_tasks.manager_rating_status','=',1)
                ->where('assign_tasks.report_status','=',1)
                ->where('assign_tasks.rating_status','=',1)
                ->join('tasks','tasks.id','=','assign_tasks.task_id')
                ->join('employees','employees.id','=','assign_tasks.employee_id')
                ->select('tasks.id','tasks.task_name','tasks.task_official_id','tasks.task_deadline'
                    ,'employees.first_name','employees.last_name','employees.employee_official_id')
                ->get();
            return view('manager.task.completed-task',[
                'tasks'=>$tasks
            ]);
        }



    // ------------ Employeee  --------------


    public function showNewTaskToEmployee()
    {
        $employeeId = Session::get('userId');
        $task = DB::table('assign_tasks')
            ->where('assign_tasks.employee_id','=',$employeeId)
            ->where('assign_tasks.report_status','=',0)
            ->where('assign_tasks.manager_rating_status','=',0)
            ->where('assign_tasks.rating_status','=',0)
            ->join('employees','assign_tasks.employee_id','=','employees.id')
            ->join('tasks','assign_tasks.task_id','=','tasks.id')
            ->select('tasks.*')
            ->get();

        return view('employee.task.new-task',[
            'tasks'=>$task
        ]);
    }
    public function showTaskDetailsToEmployee($id)
    {
         $task = Task::find($id);
         $assignTaskDetails = DB::table('assign_tasks')
            ->where('assign_tasks.task_id','=',$id)
            ->join('employees','assign_tasks.employee_id','=','employees.id')
            ->select('assign_tasks.report_status','assign_tasks.rating_status','assign_tasks.manager_rating_status','employees.*')
            ->first();
        $manager = Manager::where('id','=',$task->manager_id)->first();
        $department = Department::where('id','=',$task->department_id)->first();
        return view('employee.task.task-details',[
            'task'=>$task,
            'assignTaskDetails'=>$assignTaskDetails,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }


    public function markTaskAsDoneByEmployee($id)
    {
        $employeeId = Session::get('userId');
        $assignTask = AssignTask::where('task_id','=',$id)
            ->where('employee_id','=',$employeeId)
            ->first();
        $assignTask->report_status = 1;
        $assignTask->save();
        return redirect('/employee/new-task')->with('message','Report mark as done successfully!');


    }
    public function showCompleteTaskToEmployee()
    {
        $employeeId = Session::get('userId');

        $completeTasks = DB::table('assign_tasks')
        ->where('assign_tasks.employee_id','=',$employeeId)
        ->where('assign_tasks.report_status','=',1)
        ->join('tasks','assign_tasks.task_id','=','tasks.id')
        ->select('tasks.*')
        ->get();

        return view('employee.task.complete-tasks',[
            'completeTasks'=>$completeTasks
        ]);
    }
    public  function showCompletedTaskDetailsByEmployee($id)
    {
        $task = Task::find($id);
        $assignTaskDetails = DB::table('assign_tasks')
            ->where('assign_tasks.task_id','=',$id)
            ->join('employees','assign_tasks.employee_id','=','employees.id')
            ->select('assign_tasks.report_status','assign_tasks.rating_status','assign_tasks.manager_rating_status','employees.*')
            ->first();
        $reports = Report::where('task_id','=',$id)->get();
        $manager = Manager::where('id','=',$task->manager_id)->first();
        $department = Department::where('id','=',$task->department_id)->first();

        return view('employee.task.completed-task-details',[
            'task'=>$task,
            'assignTaskDetails'=>$assignTaskDetails,
            'manager'=>$manager,
            'department'=>$department,
            'reports'=>$reports
        ]);
    }

}

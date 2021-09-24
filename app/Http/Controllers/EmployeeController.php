<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Report;
use DB;
use Session;
use Image;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // --------- SHARED -------------
    public function showManageEmployee()
    {

        if(Session::get('userType') != 'manager')
        {
            $employees = DB::table('employees')
                ->join('departments','departments.id','=','employees.department_id')
                ->join('managers','managers.id','=','employees.manager_id')
                ->select('employees.*','departments.department_name','managers.manager_official_id')
                ->get();
            return view('admin.employee.manage-employee',[
                'employees'=>$employees
            ]);

        }
        else
        {
            $managerId = Session::get('userId');
            $employees = DB::table('employees')
                ->where('manager_id','=',$managerId)
                ->join('departments','departments.id','=','employees.department_id')
                ->join('managers','managers.id','=','employees.manager_id')
                ->select('employees.*','departments.department_name','managers.manager_official_id')
                ->get();
            return view('manager.employee.manage-employee',[
                'employees'=>$employees
            ]);
        }

    }
    public function showEmployeeDetails($id)
    {
        $employee = Employee::find($id);
        $manager = Manager::find($employee->manager_id);
        $department = Department::find($employee->department_id);
        if(Session::get('userType') == 'manager')
        {
            return view('manager.employee.employee-details',[
                'employee'=>$employee,
                'manager'=>$manager,
                'department'=>$department
            ]);
        }
        else
        {
            return view('admin.employee.employee-details',[
                'employee'=>$employee,
                'manager'=>$manager,
                'department'=>$department
            ]);
        }
    }
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return route('manage-employee')->with('message','Employee removed successfully');
    }

    //-------------------------------



    public function showManageEmployeeToAdmin()
    {
        return view("admin.employee.manage-employee");
    }
    public function showAddEmployee()
    {
        $managerId = Session::get('userId');
        $manager = Manager::find($managerId);
        $department = Department::where('id','=',$manager->department_id)->first();

        return view('manager.employee.add-employee',[
            'department'=>$department,
            'managerId'=>$managerId
        ]);
    }
    protected function uploadEmployeeImage($request){
        $employeeImage = $request->file('employee_image');
        $imageType = $employeeImage->getClientOriginalExtension();
        $imageName = $request->first_name.' '.$request->last_name.'.'.$imageType;
        $directory = 'admin/employee-images/';
        $imageUrl = $directory.$imageName;
        Image::make($employeeImage)->save($imageUrl);
        return $imageUrl;

    }
    protected function validateEmployeeInfo($request)
    {
        $this->validate($request,[
            'department_id'=> 'required',
            'manager_id'=> 'required',
            'employee_official_id'=> 'required',
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'email'=> 'required|unique:employees,email',
            'phone_number'=> 'required|max:15|min:15',
            'gender'=> 'required',
            'date_of_birth'=> 'required',
            'employee_salary'=> 'required',
            'employee_account_number'=> 'required|unique:employees,employee_account_number',
            'qualification'=> 'required',
            'user_name'=> 'required|max:15|min:5|unique:employees,user_name',
            'password'=> 'required|max:25|min:8|unique:employees,password',
            'address'=> 'required',
            'manager_image'=> 'required',
        ]);
    }
    public function saveEmployee(Request $request)
    {
        $this->validateEmployeeInfo($request);
        $imageUrl = $this->uploadEmployeeImage($request);

        $employee = new Employee();
        $employee->department_id =$request->department_id;
        $employee->manager_id =$request->manager_id;
        $employee->employee_official_id =$request->employee_official_id;
        $employee->first_name =$request->first_name;
        $employee->last_name =$request->last_name;
        $employee->email =$request->email;
        $employee->phone_number =$request->phone_number;
        $employee->gender =$request->gender;
        $employee->date_of_birth =$request->date_of_birth;
        $employee->employee_salary =$request->employee_salary;
        $employee->employee_account_number =$request->employee_account_number;
        $employee->qualification =$request->qualification;
        $employee->user_name =$request->user_name;
        $employee->password =$request->password;
        $employee->address =$request->address;
        $employee->employee_image = $imageUrl;
        $employee->save();
        return redirect('/employee/add')->with('message','Employee saved successfully');
    }




    // ------------ Employee -----------


    public function showEmployeeProfile()
    {
        $employeeId = Session::get('userId');
        $employee = Employee::find($employeeId);
        $manager = Manager::find($employee->manager_id);
        $department = Department::find($employee->department_id);
        return view('employee.profile.profile',[
            'employee'=>$employee,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function editEmployeeProfile()
    {
        $employeeId = Session::get('userId');
        $employee = Employee::find($employeeId);
        $manager = Manager::find($employee->manager_id);
        $department = Department::find($employee->department_id);
        return view('employee.profile.edit-profile',[
            'employee'=>$employee,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    protected function validateUpdateEmployeeInfo($request)
    {
        $this->validate($request,[
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'phone_number'=> 'required|max:15|min:15',
            'date_of_birth'=> 'required',
            'employee_account_number'=> 'required|unique:employees,employee_account_number',
            'address'=> 'required',
        ]);
    }

    public function  updateEmployeeProfile(Request $request){

        $employee = Employee::find($request->employee_id);
        $employee->first_name =$request->first_name;
        $employee->last_name =$request->last_name;
        $employee->phone_number =$request->phone_number;
        $employee->date_of_birth =$request->date_of_birth;
        $employee->employee_account_number =$request->employee_account_number;
        $employee->address =$request->address;
        $image = $request->file('employee_image');
        if($image)
        {
            unlink($employee->employee_image);
            $imageUrl = $this->uploadEmployeeImage($request);
            $employee->manager_image = $imageUrl;
        }
        $employee->save();
        return redirect('/employee/profile')->with('message','Profile updated successfully');
    }


}

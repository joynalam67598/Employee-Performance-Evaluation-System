<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function showAddDepartment()
    {
        return view('admin.department.add-department');
    }
    public function showManageDepartment()
    {
        $departments = Department::all();
        return view('admin.department.manage-department',[
            'departments'=>$departments
        ]);
    }
    public function saveDepartment(Request $request)
    {
        $this->validate($request,[
            'department_name'=> 'required|max:20|min:3|unique:departments,department_name'
        ]);
        $department = new Department();
        $department->department_name = $request->department_name;
        $department->save();
        return redirect('/department/add')->with('message','Department Save Successfully!');
    }
    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department/manage')->with('message','Department Deleted Successfully!');
    }
}

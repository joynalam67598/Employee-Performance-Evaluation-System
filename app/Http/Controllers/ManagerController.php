<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Manager;
use DB;
use Faker\Provider\File;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{


    // ---------------> Admin <----------------

   public function showAddManager()
   {
       $departments = Department::all();
       return view("admin.manager.add-manager",[
           'departments'=>$departments
       ]);
   }
    public function showManageManager()
    {
        $managers = DB::table('managers')
            ->join('departments','departments.id','=','managers.department_id')
            ->select('managers.*','departments.department_name')
            ->get();
        return view("admin.manager.manage-manager",[
            'managers'=>$managers
        ]);
    }
    protected function uploadManagerImage($request){
        $managerImage = $request->file('manager_image');
        $imageType = $managerImage->getClientOriginalExtension();
        $imageName = $request->first_name.' '.$request->last_name.'.'.$imageType;
        $directory = 'admin/manager-images/';
        $imageUrl = $directory.$imageName;
        Image::make($managerImage)->save($imageUrl);
        return $imageUrl;

    }

    protected function validateManagerInfo($request)
    {
        $this->validate($request,[
            'department_id'=> 'required',
            'manager_official_id'=> 'required',
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'email'=> 'required|unique:managers,email',
            'phone_number'=> 'required|max:15|min:15',
            'gender'=> 'required',
            'manager_salary'=> 'required',
            'manager_account_number'=> 'required|unique:managers,manager_account_number',
            'qualification'=> 'required',
            'user_name'=> 'required|max:15|min:5|unique:managers,user_name',
            'password'=> 'required|max:25|min:8|unique:managers,password',
            'address'=> 'required',
            'manager_image'=> 'required',
        ]);
    }


    public function saveManager(Request $request)
    {
        $this->validateManagerInfo($request);
        $imageUrl = $this->uploadManagerImage($request);

        $manager = new Manager();
        $manager->department_id =$request->department_id;
        $manager->manager_official_id =$request->manager_official_id;
        $manager->first_name =$request->first_name;
        $manager->last_name =$request->last_name;
        $manager->email =$request->email;
        $manager->phone_number =$request->phone_number;
        $manager->gender =$request->gender;
        $manager->date_of_birth =$request->date_of_birth;
        $manager->manager_salary =$request->manager_salary;
        $manager->manager_account_number =$request->manager_account_number;
        $manager->qualification =$request->qualification;
        $manager->user_name =$request->user_name;
        $manager->password =$request->password;
        $manager->address =$request->address;
        $manager->manager_image = $imageUrl;
        $manager->save();
        return redirect('/manager/add')->with('message','Manager saved successfully');
    }

    public function showManagerDetails($id)
    {
        $manager = Manager::find($id);
        $department = Department::find($manager->department_id);
        return view('admin.manager.manager-details',[
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function deleteManager($id)
    {
        $manager = Manager::find($id);
        $manager->delete();
        return redirect('/manager/manage')->with('message','Manager removed successfully');
    }

    // -------------> Manager <----------------

    public function showManagerProfile()
    {
        $managerId = Session::get('userId');
        $manager = Manager::find($managerId);
        $department = Department::find($manager->department_id);
        return view('manager.profile.profile',[
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function editManagerProfile()
    {
        $managerId = Session::get('userId');
        $manager = Manager::find($managerId);
        $department = Department::find($manager->department_id);
        return view('manager.profile.edit-profile',[
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    protected function validateUpdatedManagerInfo($request)
    {
        $this->validate($request,[
            'department_id'=> 'required',
            'manager_official_id'=> 'required',
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'phone_number'=> 'required|max:15|min:15',
            'manager_account_number'=> 'required',
            'qualification'=> 'required',
            'address'=> 'required',
        ]);
    }

    public function  updateManagerProfile(Request $request){

        $this->validateUpdatedManagerInfo($request);

        $manager = Manager::find($request->manager_id);
        $manager->department_id =$request->department_id;
        $manager->first_name =$request->first_name;
        $manager->last_name =$request->last_name;
        $manager->phone_number =$request->phone_number;
        $manager->date_of_birth =$request->date_of_birth;
        $manager->manager_account_number =$request->manager_account_number;
        $manager->qualification =$request->qualification;
        $manager->address =$request->address;
        $image = $request->file('manager_image');
        if($image)
        {
            unlink($manager->manager_image);
            $imageUrl = $this->uploadManagerImage($request);
            $manager->manager_image = $imageUrl;
        }
        $manager->save();
        return redirect('/manager/profile')->with('message','Profile updated successfully');
    }





}

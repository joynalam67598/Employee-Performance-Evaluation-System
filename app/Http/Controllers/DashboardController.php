<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function showUserLogin()
    {
        if(Session::has('userId'))
        {
            if(Session::get('userType')=='manager')
            {
                return redirect('/manager');
            }
            else if(Session::get('userType')=='employee')
            {
                return redirect('/employee');
            }
        }
        else{
            return view('auth.sign-in');
        }

    }
    public function showManagerDashboard()
    {
        if(Session::has('userId'))
        {
            if(Session::get('userType')=='manager')
            {
                return view('manager.home.home');
            }
            else if(Session::get('userType')=='employee')
            {
                return redirect('/employee');
            }
            else
            {
                Session::flush();
                return redirect('/login/user');
            }
        }
        else{
            Session::flush();
            return redirect('/login/user');
        }

    }
    public function showEmployeeDashboard()
    {
        if(Session::has('userId'))
        {
            if(Session::get('userType')=='manager')
            {
                return redirect('/manager');
            }
            else if(Session::get('userType')=='employee')
            {
                return view('employee.home.home');
            }
            else
            {
                Session::flush();
                return redirect('/login/user');
            }
        }
        else{
            Session::flush();
            return redirect('/login/user');
        }

    }
    public function signInUser(Request $request)
    {
        if($request->user_type == 'manager')
        {
            $manager = Manager::where('email',$request->email)->first();
            if($manager)
            {
//          password_verify($request->password,$manager->password)

                if($request->password==$manager->password){

                    Session::flush();
                    Session::put('userId',$manager->id);
                    Session::put('userType','manager');
                    Session::put('userName',$manager->first_name);
                    return redirect('/manager');

                }
                else{
                    return redirect('/login/user')->with('message','Invalid password!! Please, input a valid password !');
                }
            }
            else{
                return redirect('/login/user')->with('message','This email is not registered yet !!');
            }
        }
        else if($request->user_type == 'employee')
        {
            $employee = Employee::where('email',$request->email)->first();
            if($employee)
            {
                if($request->password==$employee->password){

                    Session::flush();
                    Session::put('userId',$employee->id);
                    Session::put('userType','employee');
                    Session::put('userName',$employee->first_name);
                    return redirect('/employee');
                }
                else{
                    return redirect('/login/user')->with('message','Invalid password!! Please, input a valid password !');
                }
            }
            else{
                return redirect('/login/user')->with('message','This email is not registered yet !!');
            }
        }
        else
        {
            return redirect('/login/user')->with('message','Please, try with valid input!!');
        }
    }
    public function signOutUser()
    {
        Session::flush();
        return redirect('/login/user');
    }

}

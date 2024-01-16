<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function dashboard()
    {
        $data ['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1)
        {
            $data['getAdmin'] = User::getAdmin();
            $data['getTeacher'] = User::getTeacher();
            $data['getStudent'] = User::getStudent();
            $data['getParent'] = User::getParent();
           return view('admin/dashboard' , $data);

        } else if(Auth::user()->user_type == 2) 

        {
            return view('admin/teacher/dashboard', $data);

        } else if(Auth::user()->user_type == 3) 

        {
            return view('admin/student/dashboard', $data);

        } else if (Auth::user()->user_type == 4)

        {
            return view('admin/parent/dashboard',$data);
        }
    }
}

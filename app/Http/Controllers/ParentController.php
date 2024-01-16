<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Parent List';
        $data['getParent'] = User::getParent();
        return view('admin.admin.parent.list' , $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Parent';
        return view('admin.admin.parent.add', $data);
    }

    public function post_add(Request $request)
    {
        $request->validate([
            'email' =>'required|email|unique:users',
            'password'=> 'required|min:8|max:255',
            'mobile_number' => 'required|max:10|min:10|unique:users',
        ]);
        $parent = new User;
        $parent->name = $request->name;
        $parent->last_name = $request->last_name;
        $parent->mobile_number = $request->mobile_number;
        $parent->email = $request->email;
        $parent->password = bcrypt($request->password); 

        if(!empty($request->file('profile_pic')))
        {
           $ext = $request->file('profile_pic')->getClientOriginalExtension();
           $file = $request->file('profile_pic');
           $randomStr = date('Ydmhis'). Str::random(20);
           $filename = Strtolower($randomStr). '.'. $ext;
           $file->move('upload/profile/', $filename);

           $parent->profile_pic = $filename;
        }
        $parent->blood_group = $request->blood_group;   
        $parent->gender = $request->gender;
        $parent->user_type = 4;
        $parent->profile_pic = $request->profile_pic;
        $parent->occupation = $request->occupation;
        $parent->save();

        return redirect('admin/admin/parent/list')->with('success','Parent added');
    }

    public function edit($id)
    {
        $data['getParent'] = User::getSingle($id);

        if(!empty($data ['getParent'])) 
    {
       $data['header_title'] = "Edit Parent";
       return view('admin.admin.parent.edit', $data);
    }
     else
     {

      abort(404);
     }
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=> 'required|email|unique:users,email,' .$id,
            'password'=> 'required|min:8|max:255',
            'mobile_number' => 'max:10|min:10',
        ]);
        $parent = User::getSingle( $id );
        $parent->name = $request->name;
        $parent->last_name = $request->last_name;
        $parent->occupation = $request->occupation;
        $parent->email = $request->email;
        $parent->password = bcrypt($request->password); 

        if(!empty($request->file('profile_pic')))
        {
           $ext = $request->file('profile_pic')->getClientOriginalExtension();
           $file = $request->file('profile_pic');
           $randomStr = date('Ydmhis'). Str::random(20);
           $filename = Strtolower($randomStr). '.'. $ext;
           $file->move('upload/profile/', $filename);

           $parent->profile_pic = $filename;
        }
        $parent->blood_group = $request->blood_group;   
        $parent->gender = $request->gender;
        $parent->mobile_number = $request->mobile_number;
        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/admin/parent/list')->with('success','Parent updated');
    }

    public function my_student($id)
    {  
        $data['getParent'] = User::getSingle( $id );
        $data['parent_id'] = $id;
        $data['header_title'] = " Parent Student List";
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        
        return view('admin.admin.parent.my_student', $data);
    }

    public function AssignParentStudent($student_id, $parent_id)
    {
       $student = User::getSingle($student_id);
       $student->parent_id = $parent_id;
       $student->save();

       return redirect()->back()->with('success', 'Parent Successfully Assigned');
    }

    public function AssignParentStudentDelete($student_id)
    {
       $student = User::getSingle($student_id);
       $student->parent_id = null;
       $student->save();

       return redirect()->back()->with('success', 'Parent Successfully Deleted');
    }
    
    //My Account
    public function myaccount()
    {
        $data['header_title'] = 'My Account';
        $data['getParent'] = User::getSingle(Auth::user()->id);
        return view('admin.parent.account', $data);
    }
    
    public function updateacc(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email'=> 'email|unique:users,email,'.$id,
            'password' => 'max: 255|min: 8',
            'mobile_number' => 'max:10|min:10',
        ]);
        
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->occupation = $request->occupation;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->user_type = 4;
        if(!empty($request->file('profile_pic')))
        {
           $ext = $request->file('profile_pic')->getClientOriginalExtension();
           $file = $request->file('profile_pic');
           $randomStr = date('Ydmhis'). Str::random(20);
           $filename = Strtolower($randomStr). '.'. $ext;
           $file->move('upload/profile/', $filename);

           $user->profile_pic = $filename;

        }

        $user->save();
        
        return redirect('/parent/dashboard')->with('success', 'Update Successful');

    }

    public function mystudent()
    {
        $id = Auth::user()->id;
        $data['header_title'] = " Parent Student List";
        $data['getRecord'] = User::getMyStudent($id);

        return view('admin.parent.mystudent', $data);
    }
    



    public function delete($id)
    {
      $parent = User::getSingle($id);
      $parent->is_delete = 1;
      $parent->save();

      return redirect()->back()->with('success','Parent deleted');
      
    }
}

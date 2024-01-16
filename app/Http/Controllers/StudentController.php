<?php

namespace App\Http\Controllers;

use Auth;
use GrahamCampbell\ResultType\Success;
use Hash;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Str;

class StudentController extends Controller
{
    public function list()
    {
        
        $data['header_title'] = "student list";
        $data['getStudent'] = User::getStudent();
        // $data['getPhoto'] = User::getPhoto();

        return view('admin.admin.student.list', $data);

    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getProfile'] = User::getPhoto();
        $data['header_title'] = "Add Student";

        return view('admin.admin.student.add', $data);
    }
    
    //Add Student
    public function post_add(Request $request){
    
        // dd($request->all());
          
        $request ->validate([
          'email'=> 'required|email|unique:users',
          'password'=> 'required|min:8|max:255',
          'mobile_number'=> 'required|max:10|min:10|unique:users',
          'admission_number'=> 'required|unique:users',
          'roll_number'=> 'required|unique:users',
        ]);

        $student = new User;
        $student->name = ($request->name);
        $student->email = ($request->email);
        $student->password = Hash::make($request->password);
        $student->last_name = ($request->last_name);

        if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');

    // Validation Rules
    $request->validate([
        'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example rules: Image, max size 2MB, specific image formats
    ]);

    if ($file->isValid()) {
        $ext = $file->getClientOriginalExtension();
        $randomStr = \Illuminate\Support\Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;

        // Move file to a secure directory
        $file->move('upload/profile/', $filename); // Assumes using Laravel's storage system

        // Update student's profile picture
        $student->profile_pic = $filename;
        $student->save();
    } else {
        // Handle file upload error
        // For example, return an error message or redirect back with an error
        return redirect()->back()->with('error', 'Failed to upload the file.');
    }
    } else {
    // Handle scenario where no file was uploaded
    // For example, return a message indicating no file was uploaded or handle accordingly
    return redirect()->back()->with('message', 'No file was uploaded.');
    }



        $student->gender = ($request->gender);

        if(!empty($request->date_of_birth)) 
        {
          $student->date_of_birth = $request->date_of_birth;
        }

        $student->admission_number = $request->admission_number;
        $student->admission_date = ($request->admission_date);
        $student->blood_group = ($request->blood_group);
        $student->weight = ($request->weight);
        $student->height = ($request->height);
        $student->mobile_number = ($request->mobile_number);
        $student->religion = ($request->religion);
        $student->status = ($request->status);
        $student->caste = ($request->caste);
        $student->roll_number = ($request->roll_number);
        $student->class_id = ($request->class_id);
        $student->user_type = 3;
        $student->save();
        
        return redirect('admin/admin/student/list')->with('success','student added');

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) 
        {
          $data['header_title'] = 'Edit Student';
          $data['getClass'] = ClassModel::getClass();
          $data['getStudent'] = User::getStudent();
          // $data['getProfile'] = User::getPhoto();
          return view('admin.admin.student.edit' , $data);
        } else
        {
          abort(404);
        }
 
    }

    public function update($id, Request $request)
    {
      $request ->validate([
        'email'=> 'required|email|unique:users,email,' .$id,
        'password'=> 'required|min:8|max:255',
        'mobile_number'=> 'max:10|min:10',
        'admission_number'=> 'max:50',
        'roll_number'=> 'max:50',
      ]);

         
          $student = User::getSingle($id);
          $student->name = ($request->name);
          $student->email = ($request->email);
          $student->last_name = ($request->last_name);

          if(!empty($request->file('profile_pic')))
          {
            if(!empty($student->getProfile())) {

              unlink('upload/profile/' .$student->profile_pic);

            }
             $ext = $request->file('profile_pic')->getClientOriginalExtension();
             $file = $request->file('profile_pic');
             $randomStr = date('Ydmhis'). Str::random(20);
             $filename = strtolower($randomStr). '.' .$ext;
             $file->move('upload/profile/', $filename);
             $student->profile_pic = $filename;
          }

          $student->admission_number = $request->admission_number;
          $student->gender = ($request->gender);
          $student->password = Hash::make($request->password);
          $student->admission_date = ($request->admission_date);
          $student->blood_group = ($request->blood_group);
          $student->weight = ($request->weight);
          $student->height = ($request->height);
          $student->mobile_number = ($request->mobile_number);
          $student->religion = ($request->religion);
          $student->status = ($request->status);
          $student->caste = ($request->caste);
          $student->roll_number = ($request->roll_number);
          $student->class_id = ($request->class_id);
          $student->user_type = 3;
          if(!empty($request->date_of_birth)) 
          {
            $student->date_of_birth = $request->date_of_birth;
          }
       
          $student->save();
      
          return redirect('admin/admin/student/list')->with('success','Student Successfully updated');

    }

    public function myaccount()
    {
      $data['header_title'] = 'My Account';
      $data['getRecord'] = User::getSingle(Auth::user()->id);
      return view('admin.student.account', $data);
    }

    public function accountupdate(Request $request)
    {
       $id = Auth::user()->id;

       $user = User::getSingle($id);
       $user->name = $request->name;
       $user->last_name = $request->last_name;
       $user->gender = $request->gender;
       $user->date_of_birth = $request->date_of_birth;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       if(!empty($request->file('profile_pic')))
       {
         if(!empty($user->getProfile())) {

           unlink('upload/profile/' .$user->profile_pic);

         }
          $ext = $request->file('profile_pic')->getClientOriginalExtension();
          $file = $request->file('profile_pic');
          $randomStr = date('Ydmhis'). Str::random(20);
          $filename = strtolower($randomStr). '.' .$ext;
          $file->move('upload/profile/', $filename);

          $user->profile_pic = $filename;
       }
       $user->save();

       return redirect('student/dashboard')->with('success', 'Update Successfull');
    }

    public function myunits()
    {
      $id = Auth::user()->id;
      $data['header_title'] = 'My Units';
      $data['getRecord'] = User::getMyStudent($id);

      return view('admin.student.myunits', $data);
    }


    public function delete($id)
    {
      $user = User::getSingle($id);
      $user->is_delete = 1;
      $user->save();
  
      return redirect('/admin/admin/student/list')->with('success', "Student was deleted");
    }
}

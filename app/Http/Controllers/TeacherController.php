<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getTeacher'] = User::getTeacher();
        $data['header_title'] = 'Teacher\'s List';
        return view('admin.admin.teacher.list', $data);
    }

    public function add() 
    {
      $data['header_title'] = 'Add a teacher';
      return view('admin.admin.teacher.add', $data);
    } 

    public function postadd(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|unique:users',
            'password' => 'required|max: 255|min: 8',
        ]);

        $teacher = new User;
        $teacher->id = $request->id;
        $teacher->name = $request->name;
        $teacher->last_name = $request->last_name;
        $teacher->user_type = 2;
        $teacher->email = $request->email;
        $teacher->gender = $request->gender;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->religion = $request->religion;
        $teacher->password = bcrypt($request->password);
        $teacher->blood_group = $request->blood_group;
        $teacher->date_of_birth = $request->date_of_birth;

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
        
            // Validation Rules
            $request->validate([
                'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example rules: Image, max size 2MB, specific image formats
            ]);
        
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
        
                // Move file to a secure directory
                $file->move('upload/profile/', $filename); // Assumes using Laravel's storage system
        
                // Update student's profile picture
                $teacher->profile_pic = $filename;
                $teacher->save();
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

            $teacher->weight = $request->weight;
            $teacher->height = $request->height;
            $teacher->save();

        return redirect('/admin/admin/teacher/list')->with('success','Teacher Added Successful');
    }

    public function edit($id)
    {
       
        $data['getTeacher'] = User::getSingle($id);
        if(!empty($data['getTeacher']))
        {
            $data['header_title'] = 'Teacher\'s Edit';
            return view('admin.admin.teacher.edit', $data);
        }
         else
         {
            abort(404);
         }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'password' =>'required|max:255|min:8',
            'mobile_number' => 'required|max:10|min:10',
        ]);

        $teacher = User::getSingle($id);
        $teacher->id = $request->id;
        $teacher->name = $request->name;
        $teacher->last_name = $request->last_name;
        $teacher->user_type = 2;
        $teacher->email = $request->email;
        $teacher->gender = $request->gender;
        $teacher->religion = $request->religion;
        $teacher->password = bcrypt($request->password);
        $teacher->blood_group = $request->blood_group;
        $teacher->date_of_birth = $request->date_of_birth;
         if(!empty($request->file('profile_pic')))
          {
            if(!empty($teacher->getProfile())) {

              unlink('upload/profile/' .$teacher->profile_pic);

            }
             $ext = $request->file('profile_pic')->getClientOriginalExtension();
             $file = $request->file('profile_pic');
             $randomStr = date('Ydmhis'). Str::random(20);
             $filename = strtolower($randomStr). '.' .$ext;
             $file->move('upload/profile/', $filename);

             $teacher->profile_pic = $filename;
          }
        $teacher->weight = $request->weight;
        $teacher->height = $request->height;
        $teacher->date_of_joining = $request->date_of_joining;
        $teacher->save();

        return redirect('admin/admin/teacher/list')->with('success', 'Teacher Updated');
    }

    public function delete($id)
    {
        $teacher = User::getSingle($id);
        $teacher->is_delete = 1;
        $teacher->save();

        return redirect()->back()->with('success','Teacher Deleted');
    }

}
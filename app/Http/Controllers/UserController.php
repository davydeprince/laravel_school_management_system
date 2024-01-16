<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function myaccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = 'My Account';
        
        return view('admin.teacher.account', $data);
    }
    public function change_password()
    {
        $data['header_tiltle'] = 'change password';
        return view('admin.profile.change_password', $data);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
           'email' => 'required|email|unique:users,email,'.$id,
           'password' => 'min: 8',
        ]);

        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->religion = $request->religion;
        $user->mobile_number = $request->mobile_number;
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
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        return redirect('teacher/dashboard')->with('success', 'Update Successful');
    }

    public function postChange_password(Request $request)
    {
        $user = User::getsingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)) 
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
           return redirect()->back()->with('success','password successfully updated');
        }
        else
        {
           return redirect()->back()->with('error','Old Password does not match with our records');
        }
    }
}

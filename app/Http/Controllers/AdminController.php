<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  public function list()
  {
    $data['getRecord'] = User::getAdmin();
    $data ['header_title'] = "Admin List";
    return view('admin.admin.list' , $data);
  }

  public function create() 
  {  
    
    $data['header_title'] = "Add new Admin";
    return view('admin.admin.create', $data);
  }

  public function postcreate(Request $request)
  {
    // dd($request->all());
    $request->validate([
     'email'=> 'required|email|unique:users',
     'password'=> 'required',

    ]);

    $user = new User;
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->user_type = 1;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('admin/admin/list')->with('success','Admin Successfully created');
  }

  public function edit($id) 
  {  
    $data ['getRecord'] = User::getSingle($id);

    if(!empty($data ['getRecord'])) 
    {
      $data['header_title'] = "Edit new Admin";
    return view('admin.admin.edit', $data);
    }
     else
     {

      abort(404);
     }
    
  }

  public function update($id, Request $request)
  {
      $request->validate([
        'email' =>'required|email|unique:users, email' .$id
      ]);
        
     
      $user = User::getSingle($id);;
      $user->name = trim($request->name);
      $user->email = trim($request->email);
      if(!empty($request->password)) 
      {
        $user->password = Hash::make($request->password);
      }
   
      $user->save();
  
      return redirect('admin/admin/list')->with('success','Admin Successfully updated');

  }

  public function myaccount()
  {
    $data['hearder_title'] = 'My Account';
    $data['getRecord'] = User::getSingle(Auth::user()->id);
    return view('admin.account', $data);
  }

  public function updateacc(Request $request)
  {
      $id = Auth::user()->id;
      $request->validate([
        'email' => 'email|unique:users,email,'.$id,
        'password' => 'max:255|min:8',
      ]);
      
      $user = User::getSingle($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->last_name = $request->last_name;
      $user->save();

      return redirect('/admin/dashboard')->with('success', 'Update successful');

  }

  public function delete($id)
  {
    $user = User::getSingle($id);
    $user->is_delete = 1;
    $user->save();

    return redirect('admin/admin/list')->with('success', "Admin was deleted");
  }
}

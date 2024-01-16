<?php

namespace App\Http\Controllers;

use Str;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Database\MySqlConnection;

class AuthController extends Controller
{
    public function login()

    {
        if(Auth::check()) {
       
            // return redirect('/admin/dashboard');
            if(Auth::user()->user_type == 1)
            {
               return redirect('/admin/dashboard');

            } else if(Auth::user()->user_type == 2) 

            {
               return redirect('/teacher/dashboard');

            } else if(Auth::user()->user_type == 3) 

            {
               return redirect('/student/dashboard');

            } else if (Auth::user()->user_type == 4)

            {
               return redirect('/parent/dashboard');
            }
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
           'email' => 'required',
           'password' => 'required|min: 8',
       ]);
         

     
        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)) {
          
            if(Auth::user()->user_type == 1)
            {
               return redirect('/admin/dashboard');

            } else if(Auth::user()->user_type == 2) 

            {
               return redirect('/teacher/dashboard');

            } else if(Auth::user()->user_type == 3) 

            {
               return redirect('/student/dashboard');

            } else if (Auth::user()->user_type == 4)

            {
               return redirect('/parent/dashboard');
            }

        } else {
            
            return redirect()->back()->with('error', 'Email or Password is incorrect');
        }

    }


       //Start Point
    public function forgotpassword() 
    {
       return view('auth.forgot');
    }

    public function forgotpasswordpost(Request $request)
    {
      $user = User::getEmailSingle($request->email);

      if(!empty($user))

      {
        $user->remember_token = Str::random(30);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));
        return redirect()->back()->with('success', 'Check Your Email to reset your password');
        
      } 

      else

      {

        return redirect()->back()->with('error','Enter valid email');

      }
    }
     public function reset($token)
     {
       $user = User::getTokenSingle($token);
      //  $user->save();

       if(!empty($user))
       {  

         $data['user'] = $user;
         
         return view('auth.reset', $data);
       } 
       else
       {
         abort(404);
       }
     }
    
     public function postreset($remember_token, Request $request)
     {

      if($request->password == $request->cpassword) 
      {  

         
         $user = User::getTokenSingle($remember_token);
         $user->password = Hash::make($request->password);
         $user->remember_token = Str::random(30);
         $user->save();

         return redirect('/')->with('success','Password reset was successful');
      } 
      else
      {
         return redirect()->back()->with('error', 'Password and Confirm Password does not match');
      }

     }

    

 
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
   }
    



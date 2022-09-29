<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation login form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:255',
            'recaptcha'   => 'required|max:6'
        ]);

         // CHECK USER         
         $email = $request->input('email');
         $password = $request->input('password');
    
         $user = User::where('email', '=', $email)->first();
        // dd($user)
        //  CHECK USER 
         if (!$user) {
            //  response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
             return Redirect::back()->withErrors(['Login Fail, please check email id & password']);
         }
        //  CHECK PASSWORD
         if (!Hash::check($password, $user->password)) {
            return Redirect::back()->withErrors(['Login Fail, please check email id & password']);
         }
       
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name
        ]);
        
         return Redirect::to('/dashboard')->with('message', 'Login  Successfully !');        
        
    }

  
}

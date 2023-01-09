<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('backend.adminLogin');
    }

    public function adminLoginPost(Request $request){
        $validators = $request->validate([
            'email' => 'required|email|min:10',
            'password' => 'required',
        ],[
            'email.min' => "It should be minimum 10 charecters",
        ]);

        

        if(Auth::guard()->attempt(['email' => $request->email, 'password' =>$request->password])){
            return redirect('/admin/dashboard');
        }else{
            return back()->with('message','Invalid Email or Password');
        }

    }

    public function adminRegister(){
        return view('backend.adminregister');
    }
    public function adminRegisterPost(Request $request){
        $request->validate([
            'name' => 'required|min:5,max:150',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:5',
        ],[
            'password.min' => 'Need atlast 5 charecter',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = Admin::create($data);

        auth()->guard()->login($user);
        return redirect()->route('admin.dashboard');
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function adminLoginForm(){
        return view('admin.login');
    }

    public function adminRegister(){
        return view('admin.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create($request->all());
        return $this->login($request);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        Auth::guard('admins')->attempt($credentials, $request->get('remember'));

        return 'admin login';
    }
}

<?php

namespace App\Http\Controllers;
use App\Admin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin(Request $request){
        if($request->session()->exists('username')){
            return redirect()->route('dashboard');
        }else{
            return view('admin.login');
        }
    }
    
    public function login(Request $request){
        $auth = auth()->guard('admin');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
                'username'  => 'required|string|exists:admin,username|regex:/^[a-zA-Z ]*$/',
                'password'  => 'required|string',
            ], 
            [
                'username.required'  => 'Username tidak boleh kosong',
                'username.exists'    => 'Username salah',
                'password.required'  => 'Password tidak boleh kosong',
                'username.regex'     => 'Format username salah'
            ],
        );

        if($validator->fails()) {
            return view('admin.login')->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $name  = DB::table('admin')->where('username', $request->username)->value('name');
                Session::put('username', $request->username);
                return view('admin.dashboard', compact('name'));
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect()->route('login');
    }
}

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

    public function showLoginPembeli(Request $request){
        if($request->session()->exists('username')){
            return redirect()->route('loginPembeli');
        }else{
            return view('layouts.login');
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

    public function showLoginCustomer(Request $request){
        return view('layouts.login');
    }
    
    public function loginCustomer(Request $request){
        $auth = auth()->guard('customers');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
                'username'  => 'required|exists:customers,username',
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
            return view('layouts.login')->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $name  = DB::table('customers')->where('username', $request->username)->value('name');
                Session::put('username', $request->username);
                return view('layouts.index', compact('name'));
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect()->route('loginAdmin');
    }

    public function logoutPembeli(Request $request){
        $request->session()->forget('username');
        return redirect()->route('loginPembeli');
    }
}

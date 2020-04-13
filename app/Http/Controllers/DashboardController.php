<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function dashboard(Request $request){
        if(!$request->session()->exists('username')){
            return redirect()->route('loginAdmin');
        }else{
            return view('admin.dashboard');
        }
    }  
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('layouts.index');
    }
    public function tentang(){
        return view('layouts.tentang');
    }
    public function daftar(){
        return view('layouts.daftar');
    }
}

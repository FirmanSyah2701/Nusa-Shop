<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('layouts.index');
    }
    public function about(){
        return view('layouts.about');
    }
    public function daftar(){
        return view('layouts.daftar');
    }
    public function cart(){
        return view('layouts.cart');
    }
    public function checkout(){
        return view('layouts.checkout');
    }
    public function payment(){
        return view('layouts.payment');
    }
    public function contact(){
        return view('layouts.contact');
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $products   = Product::all(); 
        $categories = Category::all(); 
        return view('layouts.index', compact('products', 'categories'));
    }

    public function about(){
        return view('layouts.about');
    }
}

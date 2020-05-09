<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\City;
use DB;
class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $count    = Product::sum('qty'); 
        return view('layouts.index', compact('products'))->with('count', $count);
    }

    public function detail(Request $request, $id){
        $q = $request->get('q');
        $products = DB::table('products')->where('product_code', $id)->get();
        $city = City::all();
        return view('layouts.checkout', compact('q', 'products', 'city'));
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
        return view('layouts.payment');
    }
    /* public function payment(){
        return view('layouts.payment');
    } */
    public function contact(){
        return view('layouts.contact');
    }

    public function ongkos(){
        return view('layouts.cek');
    }
}

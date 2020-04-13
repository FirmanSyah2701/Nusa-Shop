<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
class CustomerController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('username')){
            return redirect()->route('loginAdmin');
        }else{
            $customer = Customer::all();
            return view('admin.customer', compact('customer'))->with('i'); 
        }      
    }

    public function store(Request $request){
        $data = [
            'name'          => $request->name,
            'number_phone'  => $request->number_phone,
            'username'      => $request->username,
            'password'      => Hash::make($request->password)
        ];

        Customer::create($data);
        return redirect('/');
    }
}

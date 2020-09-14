<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'          => 'required|string|max:100|regex:/^[a-zA-Z\'\s]+$/',
            'number_phone'  => 'required|string|min:11|max:13|regex:/^[0-9]+$/',
            'username'      => 'required|alpha_num|max:30',
            'password'      => 'required|string|min:8|regex:/^[a-zA-Z0-9]*$/'
        ]);

        Customer::create($request->all());
        return redirect()->route('showLoginCustomer');
    }

    public function showRegister(){
        return view('layouts.daftar');
    }

    public function profile(){
        $account = Customer::whereCustomerId(session('customer_id'))
                    ->first();
        return view('layouts.profile', compact('account'));
    } 

    public function profileUpdate(Request $request, $id){
        $request->validate([
            'name'          => 'required|string|max:100|regex:/^[a-zA-Z\'\s]+$/',
            'number_phone'  => 'required|string|min:11|max:13|regex:/^[0-9]+$/',
            'username'      => 'required|alpha_num|max:30'
        ]); 

        $data = $request->only('username', 'name', 'number_phone');
        
        Customer::whereCustomerId($id)->update($data);
        return redirect('profile');
    }

    public function showAllCustomer(){
        if(!session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $customer = Customer::all();
            return view('admin.customer', compact('customer'))->with('i');
        }      
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Admin;
use App\Product;
use App\Payment;
use App\Customer;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function showLoginAdmin(){
        if(session()->exists('admin')){
            return redirect()->route('dashboard');
        }else{
            return view('admin.login');
        }
    }

    public function showLoginCustomer(){
        if(session()->exists('customer_id')){
            return redirect()->route('home');
        }else{
            return view('layouts.login');
        }
    }
    
    public function loginAdmin(Request $request){
        $auth = auth()->guard('admin');

        $credentials = $request->only('username', 'password');

        $validator = Validator::make([
            'username'  => 'required|string|exists:admin,username',
            'password'  => 'required|string',
        ], 
        [
            'username.required'  => 'Username tidak boleh kosong',
            'username.exists'    => 'Username salah',
            'password.required'  => 'Password tidak boleh kosong'
        ]
        );

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $name  = Admin::whereUsername($request->username)->value('name');
                session()->put('admin', $request->username);
                
                $customers  = Customer::count();
                $payment    = Payment::whereValidationId(3)->count();
                $profit     = DB::table('payment')
                                ->join('checkout', 'checkout.checkout_id', '=', 'payment.checkout_id')
                                ->where('payment.validation_id', 3)
                                ->sum('checkout.total_price');
                return view('admin.dashboard', compact('name', 'customers', 'payment', 'profit'));
            }else{
                return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }
    
    public function loginCustomer(Request $request){
        $auth = auth()->guard('customers');

        $credentials = $request->only('username', 'password');

        $validator = Validator::make($request->all(),[
                'username'  => 'required|exists:customers,username',
                'password'  => 'required',
            ], 
            [
                'username.required'  => 'Username tidak boleh kosong',
                'username.exists'    => 'Username salah',
                'password.confirmed' => 'Password salah',
                'password.required'  => 'Password tidak boleh kosong',
            ]
        );

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $products   = Product::all();
                $count      = Product::sum('qty');
                $customer   = Customer::whereUsername($request->username)->value('customer_id');
                $categories = Category::all();
                session()->put('customer_id', $customer);
                return view('layouts.index', compact('products', 'customer', 'count', 'categories'));
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function logoutAdmin(Request $request){
        $request->session()->forget('admin');
        return redirect()->route('loginAdmin');
    }

    public function logoutCustomer(Request $request){
        $request->session()->forget('customer_id');
        return redirect()->route('home');
    }
}

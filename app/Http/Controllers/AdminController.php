<?php

namespace App\Http\Controllers;

use DB;
use App\Customer;
use App\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        if(!session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $customers  = Customer::count();
            $payment    = Payment::whereValidationId(3)->count();
            $profit     = Payment::join('checkout', 'checkout.checkout_id', '=', 'payment.checkout_id')
                            /* ->join('capital', 'capital.date', '=', 'payment.date') */
                            ->where('payment.validation_id', 3)
                            ->sum('checkout.total_price');
            return view('admin.dashboard', compact('customers', 'payment', 'profit'));
        }
    }  
}

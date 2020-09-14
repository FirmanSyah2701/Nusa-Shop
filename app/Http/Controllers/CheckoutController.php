<?php

namespace App\Http\Controllers;

use DB;
use App\Cart;
use App\City;
use App\Payment;
use App\Customer;
use App\Checkout;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $request->validate(
            [
                'city_id'       => 'required',
                'courier'       => 'required|string',
                'customer_name' => 'required|string',
                'full_address'  => 'required|string|max:255',
                'number_phone'  => 'required|string|max:13',
                'total_price'   => 'required|numeric',
                'service'       => 'required',
                'etd'           => 'required'
            ],
            [
                'city_id.required'           => 'Data city tidak boleh kosong',
                'courier.required'           => 'Data courier tidak boleh kosong',
                'customer_name.required'     => 'Data customer tidak boleh kosong',
                'full_address.required'      => 'Data full_address tidak boleh kosong',
                'number_phone.required'      => 'Data phone tidak boleh kosong',
                'total_price.required'       => 'Data price tidak boleh kosong',
                'service.required'           => 'Data service tidak boleh kosong',
                'etd.required'               => 'Data etd tidak boleh kosong',
                'numeric'                    => 'Data harus diisi dengan angka',
                'string'                     => 'Data harus diisi dengan huruf'
            ]
        );

        $data = [
            'customer_id'       => $request->customer_id,
            'city_id'           => $request->city_id,
            'courier'           => $request->courier,
            'customer_name'     => $request->customer_name,
            'full_address'      => $request->full_address,
            'number_phone'      => $request->number_phone,
            'total_price'       => $request->total_price,
            'service'           => $request->service,
            'etd'               => $request->etd
        ];

        Checkout::create($data);
        Cart::whereCustomerId(session('customer_id'))
            ->update(['status' => 1]);
        $id    = Checkout::whereCustomerId($request->customer_id)->value('checkout_id');
        $date  = Carbon::today()->toDateString();
        Payment::create(['checkout_id' => $id, 'validation_id' => 2, 'date' => $date]);
        return redirect()->route('riwayatCheckout');
    }

    public function showCheckout(Request $request){
        $datas      = DB::table('cart')
                        ->join('products', 'cart.product_code', 'products.product_code')
                        ->select('products.*', 'cart.cart_id', 'cart.qty')
                        ->where('customer_id', session('customer_id'))
                        ->where('status', 0)
                        ->get();
        $subTotal   =  DB::table('cart')
                        ->join('products', 'cart.product_code', 'products.product_code')
                        ->select('products.*', 'cart.cart_id', 'cart.qty')
                        ->where('customer_id', session('customer_id'))
                        ->where('status', 0)
                        ->sum(DB::raw('products.price * cart.qty'));            
        $cities     = City::all(); 
        $customer   = Customer::whereCustomerId(session('customer_id'))->first();
        return view('layouts.checkout', compact('datas', 'cities', 'customer', 'subTotal'));
    }

    public function showHistoryCheckout(){
        $id     = Customer::whereCustomerId(session('customer_id'))->value('customer_id');
        $datas  = DB::table('checkout')
                    ->join('payment', 'payment.checkout_id', 'checkout.checkout_id')
                    ->join('validations', 'validations.validation_id', 'payment.validation_id')
                    ->join('city', 'city.city_id', 'checkout.city_id')
                    ->select('checkout.checkout_id', 'payment.photo', 'payment.payment_id', 
                        'checkout.total_price', 'checkout.full_address', 'checkout.etd', 
                        'city.city_name', 'validations.validation_id', 
                        'validations.validation', 'checkout.customer_id')
                    ->where('checkout.customer_id', $id)
                    ->get();
        
        $products = Cart::whereCustomerId($id)->whereStatus(1)->get();
        return view('layouts.history_checkout', compact('datas','products'))->with('i');
    }

}

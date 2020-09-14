<?php

namespace App\Http\Controllers;

use DB;
use App\Cart;
use App\City;
use App\Product;
use App\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if(session()->exists('customer_id')){
            $datas      = Cart::where('customer_id', session('customer_id'))
                            ->where('status', '=', 0)
                            ->get();
            $subTotal   = DB::table('cart')
                            ->join('products', 'cart.product_code', 'products.product_code')
                            ->where('status', 0)
                            ->sum(DB::raw('products.price * cart.qty'));
            return view('layouts.cart', compact('subTotal','datas'));
        }else{
            return redirect()->route('showLoginCustomer');
        }   
    }

    public function store(Request $request){
        if(session()->exists('customer_id')){
            if($request->has('keranjang')){
                $exists = Cart::where('product_code', $request->product_code)
                            ->where('status', 0)
                            ->value('product_code');
                if($exists){
                    $qtyBefore = Cart::where('product_code', $request->product_code)
                                    ->value('qty');
                    $qtyUpdate = $qtyBefore + $request->qty;
                    
                    Cart::whereProductCode($exists)
                        ->update(['qty' => $qtyUpdate]);
                    return redirect()->route('home');
                }else{
                    $data = [
                        'product_code' => $request->product_code,
                        'customer_id'  => session('customer_id'),
                        'qty'          => $request->qty,
                        'status'       => 0,
                    ];
            
                    Cart::create($data);
                    $productQty = Product::whereProductCode($request->product_code)
                                    ->value('qty');
                    $subtract   = $productQty - $request->qty;
                    Product::whereProductCode($request->product_code)
                        ->update(['qty' => $subtract]);
                    return redirect()->route('home');
                }
            }elseif($request->has('pesanan')){
                $request->validate([
                    'customer_id'   => 'nullable'
                ]);

                $data = [
                    'product_code' => $request->product_code,
                    'qty'          => $request->qty,
                    'customer_id'  => session('customer_id'),
                    'status'       => 2,
                ];
        
                Cart::create($data);
                
                $datas      = DB::table('cart')
                                ->join('products', 'cart.product_code', 'products.product_code')
                                ->select('products.*', 'cart.cart_id', 'cart.qty')
                                ->where('customer_id', session('customer_id'))
                                ->where('cart.status', 2)
                                ->get();
                $cities     = City::all(); 
                $customer   = Customer::whereCustomerId(session('customer_id'))->first();
                $subTotal   =  DB::table('cart')
                                ->join('products', 'cart.product_code', 'products.product_code')
                                ->select('products.*', 'cart.cart_id', 'cart.qty')
                                ->where('customer_id', session('customer_id'))
                                ->where('status', 2)
                                ->sum(DB::raw('products.price * cart.qty'));
                $productQty = Product::whereProductCode($request->product_code)
                                ->value('qty');
                $subtract   = $productQty - $request->qty;
                Product::whereProductCode($request->product_code)
                    ->update(['qty' => $subtract]);
                return view('layouts.checkout', compact('datas', 'cities', 'customer', 'subTotal'));    
            }
        }else{
            return redirect()->route('showLoginCustomer');
        }
        
    }

    public function destroy($id)
    {
        $data = Cart::findOrFail($id);
        if($data){
            $cart       = Cart::where('cart_id', $id)->first();
            $product    = Product::where('product_code', $cart->product_code)->value('qty');
            $sum        = $cart->qty + $product;
            Product::where('product_code', $cart->product_code)->update(['qty' => $sum]);
        }
        $data->delete();
        return redirect()->back();
    }
}

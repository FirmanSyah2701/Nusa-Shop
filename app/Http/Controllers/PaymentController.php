<?php

namespace App\Http\Controllers;

use DB;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPost(Request $request, $id){
        $request->validate(
            [
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
            ],
            [
                'uploaded'  => 'Foto tidak boleh lebih dari 2mb',
                'required'  => 'Foto tidak boleh kosong', 
                'image'     => 'File hanya boleh foto',
                'mimes'     => 'Format file foto hanya boleh jpeg, jpg dan png'
            ]
        );

        $photo    = $request->file('photo');
        $new_name = rand() .'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('/assets/img/product'), $new_name);

        Payment::wherePaymentId($id)->update(['photo' => $new_name]);
        return redirect()->route('riwayatCheckout');
    }

    public function confirmation(Request $request){
        if(!$request->session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $datas      = DB::table('payment')
                            ->join('validations', 'payment.validation_id', 'validations.validation_id')
                            ->join('checkout','checkout.checkout_id','payment.checkout_id')
                            ->join('city', 'checkout.city_id','city.city_id')
                            ->join('province', 'province.province_id', 'city.province_id')
                            ->select('checkout.*', 'city.city_name', 'province.province', 
                                'payment.*','validations.validation')
                            ->get();

            $pemesanan  = DB::table('cart')
                            ->join('products', 'cart.product_code','products.product_code')
                            ->join('categories', 'products.category_id','categories.category_id')
                            ->select('cart.qty', 'products.product_name','categories.category_name')
                            ->get();
        }
        return view('admin.confirmation', compact('datas', 'pemesanan'))->with('i');
    }

    public function download($id){
        $payment    = Payment::wherePaymentId($id)->firstOrFail(); 
        $path       = public_path(). '/assets/img/product/' . $payment->photo;
        return response()->download($path, $payment->original_filename,
            ['Content-Type' => $payment->mime]
        );
    }

    public function confirmationUpdate(Request $request, $id){
        if($request->has('2')){
            Payment::wherePaymentId($id)->update(['validation_id' => 2]);;
            return redirect()->route('confirmation');
        }else if($request->has('3')){
            Payment::wherePaymentId($id)->update(['validation_id' => 1]);
            return redirect()->route('confirmation');
        }else if($request->has('4')){
            Payment::wherePaymentId($id)->update(['validation_id' => 3]);
            return redirect()->route('confirmation');
        }
    }

    public function sell(Request $request){
        if(!$request->session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $datas = DB::table('payment')
                        ->join('checkout', 'checkout.checkout_id', 'payment.checkout_id')
                        ->join('capital', 'capital.date', 'payment.date')
                        ->where('payment.validation_id', 3)
                        ->select('capital.capital', 'payment.date')
                        ->get();

            $money  = DB::table('payment')
                        ->join('checkout', 'checkout.checkout_id', '=', 'payment.checkout_id')
                        ->join('capital', 'capital.date', '=', 'payment.date')
                        ->where('payment.validation_id', 3)
                        ->sum('checkout.total_price');
            
            $profit = DB::table('payment')
                        ->join('checkout', 'checkout.checkout_id', '=', 'payment.checkout_id')
                        ->join('capital', 'capital.date', '=', 'payment.date')
                        ->where('payment.validation_id', 3)
                        ->sum(DB::raw('capital.capital - checkout.total_price'));
            //dd($datas);
            return view('admin.sell',compact('datas', 'money', 'profit'))->with('i'); 
        }   
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'))->with('i');
        //return view('admin.products');        
    }
    
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_code'  => 'required|numeric|max:15',
                'name_product'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'price'         => 'required|numeric',
                'qty'           => 'required|numeric|max:5',
                'photo'         => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'
            ],
            [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf',
                'photo.mimes'   => 'Format file tidak valid'
            ]
        );

        $photo    = $request->file('photo');
        $new_name = rand() .'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('assets/img/product'), $new_name);
        $data = [
            'product_code'  => $request->product_code,
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'qty'           => $request->qty,
            'photo'         => $new_name
        ];

        Product::create($data);
        return redirect()->route('listProduct');
    }

    public function update(Request $request, $id)
    {
        $photo_name = $request->hidden_photo;
        $photo = $request->file('photo');
        if($photo != ''){
            $request->validate(
                [
                    'product_code'  => 'required|numeric|max:15',
                    'name_product'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                    'price'         => 'required|numeric',
                    'qty'           => 'required|numeric|max:5',
                    'photo'         => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'
                ],
                [
                    'required'      => 'Data tidak boleh kosong',
                    'numeric'       => 'Data harus diisi dengan angka',
                    'string'        => 'Data harus diisi dengan huruf',
                    'photo.mimes'   => 'Format file tidak valid'
                ]
            );

            $photo_name = rand() .'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('assets/img/producct'), $photo_name);
        }else {
            $request->validate(
                [
                    'product_code'  => 'required|numeric|max:15',
                    'name_product'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                    'price'         => 'required|numeric',
                    'qty'           => 'required|numeric|max:5',
                ],
                [
                    'required'      => 'Data tidak boleh kosong',
                    'numeric'       => 'Data harus diisi dengan angka',
                    'string'        => 'Data harus diisi dengan huruf'
                ]
            );
        }
        $data = [
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'qty'           => $request->qty,
            'photo'         => $new_name
        ];

        Product::whereProduct_code($id)->update($data);
        return redirect()->route('listProduct');
    }

    /* public function destroy($id)
    {
        //
    } */
}

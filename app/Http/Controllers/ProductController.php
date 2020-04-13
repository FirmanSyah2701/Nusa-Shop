<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->exists('username')){
            return redirect()->route('loginAdmin');
        }else{
            $products   = Product::all();
            $categories = Category::all();
            return view('admin.products', compact('products', 'categories'))->with('i');
        }     
    }
    
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_code'  => 'required|numeric|max:15',
                'product_name'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'price'         => 'required|numeric',
                'qty'           => 'required|numeric|max:5',
                'description'   => 'required|string|max:255',
                'photo'         => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
                'category_id'   => 'required'
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
            'product_name'  => $request->product_name,
            'price'         => $request->price,
            'qty'           => $request->qty,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
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
                    'product_name'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                    'price'         => 'required|numeric',
                    'qty'           => 'required|numeric|max:5',
                    'description'   => 'required|max:255',
                    'category_id'   => 'required',
                    'photo'         => 'image|mimes:jpeg,jpg,png,svg|max:2048'
                ],
                [
                    'required'      => 'Data tidak boleh kosong',
                    'numeric'       => 'Data harus diisi dengan angka',
                    'string'        => 'Data harus diisi dengan huruf',
                    'photo.mimes'   => 'Format file tidak valid'
                ]
            );

            $photo_name = rand() .'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('assets/img/product'), $photo_name);
        }else {
            $request->validate(
                [
                    'product_name'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                    'price'         => 'required|numeric',
                    'qty'           => 'required|numeric|max:5',
                    'description'   => 'required|max:255',
                    'category_id'   => 'required'
                ],
                [
                    'required'      => 'Data tidak boleh kosong',
                    'numeric'       => 'Data harus diisi dengan angka',
                    'string'        => 'Data harus diisi dengan huruf'
                ]
            );
        }
        $data = [
            'product_name'  => $request->product_name,
            'price'         => $request->price,
            'qty'           => $request->qty,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'photo'         => $photo_name
        ];

        Product::whereProduct_code($id)->update($data);
        return redirect()->route('listProduct');
    }

    /* public function destroy($id)
    {
        //
    } */
}

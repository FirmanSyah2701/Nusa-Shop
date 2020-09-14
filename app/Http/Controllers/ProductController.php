<?php

namespace App\Http\Controllers;

use File;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if(!session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $products     = Product::paginate(10);
            $categories   = Category::all();
            return view('admin.products', compact('products', 'categories'))->with('i');
        }     
    }

    public function search(Request $request){
        $search     = $request->search;
        $categories = Category::all();
        $products   = Product::where('product_name', 'LIKE', "%{$search}%")
                        ->orwhere('description', 'LIKE', "%{$search}%")
                        ->orwhere('price', 'LIKE', "%{$search}%")
                        ->paginate(10); 
        return view('layouts.index', compact('products', 'categories'));
    }

    public function showProductById($id){
        $categories = Category::all();
        $products   = Product::whereCategoryId($id)->get();
        return view('layouts.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'product_code'  => 'required|string|max:15|regex:/^[a-zA-Z0-9]*$/',
                'product_name'  => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'price'         => 'required|numeric',
                'qty'           => 'required|numeric',
                'weight'        => 'required|numeric',
                'description'   => 'required|string|max:255',
                'photo'         => 'required|image|mimes:jpeg,jpg,png|max:1048',
                'category_id'   => 'required'
            ],
            [
                'product_code.regex' => 'Kode barang tidak boleh ada spasi',
                'product_code.max'   => 'Kode barang tidak boleh lebih dari 16 carakter',
                'required'           => 'Data tidak boleh kosong',
                'numeric'            => 'Data harus diisi dengan angka',
                'string'             => 'Data harus diisi dengan huruf',
                'photo.mimes'        => 'Format file tidak valid harus jpg,jpeg atau png',
                'photo.max'          => 'Ukuran file tidak boleh melebihi 2mb',
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
            'weight'        => $request->weight,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'photo'         => $new_name
        ];

        Product::create($data);
        return redirect()->route('listProduct')->with('success', 'Data berhasil ditambahkan');
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
                    'qty'           => 'required|numeric',
                    'weight'        => 'required|numeric',
                    'description'   => 'required|max:255',
                    'category_id'   => 'required',
                    'photo'         => 'image|mimes:jpeg,jpg,png|max:2048'
                ],
                [
                    'required'          => 'Data tidak boleh kosong',
                    'numeric'           => 'Data harus diisi dengan angka',
                    'string'            => 'Data harus diisi dengan huruf',
                    'photo.mimes'       => 'Format file tidak valid',
                    'photo.uploaded'    => 'Ukuran file tidak boleh melebihi 2mb'
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
                    'weight'        => 'required|numeric',
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
            'weight'        => $request->weight,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'photo'         => $photo_name
        ];

        Product::whereProductCode($id)->update($data);
        return redirect()->route('listProduct')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id){
        try {
            $data = Product::findOrFail($id);
            File::delete('assets/img/product'.$data->photo);
            $data->delete();
            return redirect()
                ->route('listProduct')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Data gagal dihapus');
        }
    }
}

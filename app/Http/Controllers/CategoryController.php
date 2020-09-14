<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(){
        if(session()->exists('admin')){
            $categories = Category::all();
            return view('admin.categories', compact('categories'))->with('i');    
        }else{
            return redirect()->route('loginAdmin');
        }
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|max:100|string|unique:categories|regex:/^[a-zA-Z\s]*$/',
        ],
        [
            'required'  => 'Nama kategori harus diisi',
            'unique'    => 'Nama kategori sudah terdaftar',
            'max'       => 'Panjangan karakter nama kategori maksimal 100 karakter',
            'regex'     => 'Nama kategori hanya boleh diisi dengan huruf'
        ]);
        
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Data berhasi disimpan');
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required|max:100|string|unique:categories|regex:/^[a-zA-Z\s]*$/',
        ],
        [
            'required'  => 'Nama kategori harus diisi',
            'unique'    => 'Nama kategori sudah terdaftar',
            'max'       => 'Panjangan karakter nama kategori maksimal 100 karakter',
            'regex'     => 'Nama kategori hanya boleh diisi dengan huruf'
        ]);

        Category::where('category_id', $id)->update($request->only('category_name'));
        return redirect()->route('category.index')->with('success', 'Data berhasi diubah');
    }

    public function destroy($id){
        try {
            $data = Category::findOrFail($id);
            $data->delete();
            return redirect()
                ->route('category.index')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Data gagal dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Capital;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    public function capital(){
        if(!session()->exists('admin')){
            return redirect()->route('loginAdmin');
        }else{
            $datas     = Capital::all(); 
            $date      = Capital::orderBy('date', 'desc')->value('date');
            $monthYear = strtotime($date); 
            $minDate   = date('Y-m', strtotime('+1 month',$monthYear));
            return view('admin.capital',compact('datas', 'minDate'))->with('i');   
        }
    }

    public function capitalPost(Request $request){
        $date = date('Y-m-d', strtotime($request->date));
        
        $request->validate([
            'capital' => 'required|numeric|regex:/^[0-9]*$/',
            'date'    => 'required|date'
        ],
        [
            'capital.required'  => 'Modal harus diisi!',
            'capital.regex'     => 'Modal hanya boleh diisi dengan bilangan bulat',
            'date.required'     => 'Tanggal harus diisi!',
        ]);

        $exists = Capital::where('date', $request->date)->count();
        if($exists == 0){
            Capital::create([
                'capital'   => $request->capital,
                'date'      => $date,
            ]); 
            return redirect()->route('capital')->with('success', 'Data berhasil ditambahkan');    
        }else{
            return redirect()->back()->withErrors('Tanggal tidak boleh sama');
        }
    }
}

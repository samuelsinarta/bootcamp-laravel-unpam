<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriproduk;

class Kategoricontroller extends Controller
{
    public function index(){
        $param = [
            "title" => "Kategori Produk",
            "modulName" => "kategoriproduk",
            "daftarkategori"=> Kategoriproduk::all(),
        ];
            return view ('kategoriproduk' , $param);
        }

    public function databaru(){
        $param = [
            "title" => "Menambah Kategori Baru"
        ];
        return view ('kategoribaru',$param);
    }
    
    public function savedatabaru(Request $request){
        $request->validate(
            [
                "kodekategori"=> "required|min:3|max:4|unique:tbl_kategori,kodekategori"
            ],
            [
                "kodekategori.required"=> "Kode Kategori Harus di isi",
                "kodekategori.min"=> "Input minimal 3 karakter",
                "kodekategori.max"=> "Input maksimal 4 karakter",
                "kodekategori.unique"=> "Kode Kategori sudah terdaftar"
            ]
        );

        Kategoriproduk::create(
            [
                "kodekategori"=>$request->kodekategori,
                "namakategori"=>$request->namakategori
            ]
        );
        return redirect(url('kategoriproduk'));
    }
}
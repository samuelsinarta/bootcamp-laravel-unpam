<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriproduk;

class Kategoricontroller extends Controller
{
    public function index(){
        $param = [
            "title" => "Kategori Produk",
            "modulename" => "kategoriproduk",
            "daftarkategori"=> Kategoriproduk::all(),
        ];
            return view ('kategoriproduk' , $param);
        }

    public function databaru(){
        $param = [
            "title" => "Menambah Kategori Baru",
            "modulename" => "kategoriproduk",
        ];
        return view ('kategoribaru',$param);
    }
    
    public function savedatabaru(Request $request){
        $request->validate(
            [
                "kodekategori"=> "required|min:3|max:4|unique:tbl_kategori,kodekategori",
                "namakategori"=> "required|min:3|max:30"
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

    public function editkategori($id){
        $datakategori = Kategoriproduk::find($id);
        $param = [
            "title" => "Edit Kategori",
            "modulename" => "kategoriproduk",
            "datakategori" => $datakategori
        ];
        return view ('editkategori',$param);
    }

    public function saveeditkategori(Request $request){
        $request->validate(
            [
                "kodekategori"=> "required|min:3|max:4",
                "namakategori"=> "required|min:3|max:30"
            ],
            [
                "kodekategori.min"=> "Input minimal 3 karakter",
                "kodekategori.max"=> "Input maksimal 4 karakter",
                "kodekategori.unique"=> "Kode Kategori sudah terdaftar",
            ]
        );

        $databaru = [
            "kodekategori" => $request->kodekategori,
            "namakategori" => $request->namakategori
        ];

        Kategoriproduk::where('id', $request->id)->update($databaru);
        return redirect(url('kategoriproduk'));
    }

    public function hapuskategori(Request $request){
        Kategoriproduk::destroy($request->id);
        return redirect(url('kategoriproduk'));
    }
}
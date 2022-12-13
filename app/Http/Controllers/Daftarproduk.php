<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkmodel;

class Daftarproduk extends Controller
{
    public function index(){
        $data = Produkmodel::orderBy('kategoriid','asc')->paginate(10);
        $param = [
            "title" => "Daftar Produk",
            "daftarproduk" => $data,
        ];

        return view('daftarproduk', $param);
    }

    public function databaru(){
        $param = [
            "title" => "Menambah Produk Baru"
        ];
        return view ('produkbaru',$param);
    }

    public function savedatabaru(Request $request){
        $request->validate(
            [
                "kodeproduk"=> "required|min:3|max:4|unique:tbl_produk,kodeproduk",
                "namaproduk"=> "required|min:3|max:30"
            ],
            [
                "kodeproduk.required"=> "Kode produk Harus di isi",
                "kodeproduk.min"=> "Input minimal 3 karakter",
                "kodeproduk.max"=> "Input maksimal 4 karakter",
                "kodeproduk.unique"=> "Kode produk sudah terdaftar"
            ]
        );

        Produkmodel::create(
            [
                "kodeproduk"=>$request->kodeproduk,
                "namaproduk"=>$request->namaproduk,
                "harga"=>$request->harga,
                "jmlstok"=>$request->jmlstok,
                "kategoriid"=>$request->kategoriid
            ]
        );
        return redirect(url('daftarproduk'));
    }

    public function editproduk($id){
        $dataproduk = Produkmodel::find($id);
        $param = [
            "title" => "Edit Produk",
            "dataproduk" => $dataproduk
        ];
        return view ('editproduk',$param);
    }

    public function saveeditproduk(Request $request){
        $request->validate(
            [
                "kodeproduk"=> "required|min:3|max:4",
                "namaproduk"=> "required|min:3|max:30"
            ],
            [
                "kodeproduk.min"=> "Input minimal 3 karakter",
                "kodeproduk.max"=> "Input maksimal 4 karakter",
                "kodeproduk.unique"=> "Kode produk sudah terdaftar"
            ]
        );

        $databaru = [
            "kodeproduk"=>$request->kodeproduk,
            "namaproduk"=>$request->namaproduk,
            "harga"=>$request->harga,
            "jmlstok"=>$request->jmlstok,
            "kategoriid"=>$request->kategoriid
        ];
        Produkmodel::where('id', $request->id)->update($databaru);
        return redirect(url('daftarproduk'));
    }

    public function hapusproduk(Request $request){
        Produkmodel::destroy($request->id);
        return redirect(url('daftarproduk'));
    }
}

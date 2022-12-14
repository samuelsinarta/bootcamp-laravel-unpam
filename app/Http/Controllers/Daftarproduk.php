<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkmodel;
use App\Models\Kategoriproduk;
use PDF;

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
            "title" => "Menambah Produk Baru",
            "daftarkategori" => Kategoriproduk::all(),
        ];
        return view ('produkbaru',$param);
    }

    public function savedatabaru(Request $request){
        $request->validate(
            [
                "kodeproduk"=> "required|min:3|max:4|unique:tbl_produk,kodeproduk",
                "namaproduk"=> "required|min:3|max:30",
                "harga"=> "required",
                "jmlstok" => "required",
                "kategoriid" => "required"
            ],
            [
                "kodeproduk.required"=> "Kode produk Harus di isi",
                "kodeproduk.min"=> "Input minimal 3 karakter",
                "kodeproduk.max"=> "Input maksimal 4 karakter",
                "kodeproduk.unique"=> "Kode produk sudah terdaftar",
                "namaproduk.required"=> "Nama produk Harus di isi",
                "harga.required"=> "Harga produk Harus di isi",
                "jmlstok.required"=> "Jumlah stok produk Harus di isi",
                "kategoriid.required"=> "Kategori ID Harus di isi"
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
            "modulename" => "produk",
            "dataproduk" => $dataproduk,
            "daftarkategori" => Kategoriproduk::all(),
        ];
        return view ('editproduk',$param);
    }

    public function saveeditproduk(Request $request){
        $request->validate(
            [
                "kodeproduk"=> "required|min:3|max:4",
                "namaproduk"=> "min:3|max:30",
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

    public function cetakpdf(){
        $data = Produkmodel::all();
        $param = [
            "title" => "Daftar Produk",
            "modulename" => "produk",
            "daftarproduk" => $data,
        ];
        $pdf = PDF::loadview('laporanproduk',['daftarproduk'=>$data]);
        return $pdf->download('laporanproduk.pdf');
    }
}

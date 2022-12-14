<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategoriproduk;

class Produkmodel extends Model
{
    use HasFactory;
    protected $table ="tbl_produk";
    protected $fillable =[
        "kodeproduk",
        "namaproduk",
        "harga",
        "jmlstok",
        "kategoriid"
    ];

    public function kategori(){
        return $this->belongsTo(Kategoriproduk::class,'kategoriid','id');
    }

    public function scopeFilter($query,$filter){
        if ($filter){
            return $query->where('namaproduk','like','%'.request('namaproduk').'%');
        }
    }
}

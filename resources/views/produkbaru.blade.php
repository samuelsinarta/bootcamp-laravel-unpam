@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        
      </div>
      <div class="container" >
        <form action="daftarproduk" method="post">
            @csrf
        <div class="mb-3">
            <label for="kodeproduk" class="form-label">Kode Produk</label>
            <input type="text" class="form-control @error('kodeproduk') is-invalid @enderror" value="{{old ('kodeproduk')}}" name="kodeproduk" placeholder="Masukan Kode Produk">
            @error ('kodeproduk')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="namaproduk" class="form-label">Nama produk</label>
            <input type="text" class="form-control @error('namaproduk') is-invalid @enderror" value="{{old ('namaproduk')}}" name="namaproduk" placeholder="Masukan Nama produk">
            @error ('namaproduk')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga produk</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{old ('harga')}}" name="harga" placeholder="Masukan Harga produk">
            @error ('harga')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="jmlstok" class="form-label">Jumlah Stok produk</label>
            <input type="text" class="form-control @error('jmlstok') is-invalid @enderror" value="{{old ('jmlstok')}}" name="jmlstok" placeholder="Masukan Jumlah Stok produk">
            @error ('jmlstok')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <select name="kategoriid" class="form-select" aria-label="Default select example">
                <option>Pilih kategori</option>
                @foreach ($daftarkategori as $kategori)
                    <option value="{{ $kategori->id}}">{{ $kategori->namakategori}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Tambah produk</button>
      </form>
      
</main>
@endsection
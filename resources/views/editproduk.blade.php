@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
            <form action="{{url('daftarproduk')}}" method="POST">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$dataproduk -> id}}">
                <button type="submit" class="btn btn-danger btn-sm">Hapus produk</button>
            </form>
      </div>
      <div class="container" >
        <form action="{{url('daftarproduk')}}" method="post">
            @method('patch')
            @csrf
        <input type="hidden" name="id" value="{{$dataproduk -> id}}">
        <div class="mb-3">
            <label for="kodeproduk" class="form-label">Kode produk</label>
            <input type="text" class="form-control @error('kodeproduk') is-invalid @enderror" value="{{old ('kodeproduk', $dataproduk->kodeproduk)}}" name="kodeproduk" placeholder="Masukan Kode produk">
            @error ('kodeproduk')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="namaproduk" class="form-label">Nama produk</label>
            <input type="text" class="form-control @error('namaproduk') is-invalid @enderror" value="{{old ('namaproduk', $dataproduk->namaproduk)}}" name="namaproduk" placeholder="Masukan Nama produk">
            @error ('namaproduk')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga produk</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{old ('harga', $dataproduk->harga)}}" name="harga" placeholder="Masukan Harga produk">
            @error ('harga')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="jmlstok" class="form-label">Jumlah Stok produk</label>
            <input type="text" class="form-control @error('jmlstok') is-invalid @enderror" value="{{old ('jmlstok', $dataproduk->jmlstok)}}" name="jmlstok" placeholder="Masukan Jumlah Stok produk">
            @error ('jmlstok')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <select name="kategoriid" class="form-select" aria-label="Default select example">
                <option>Pilih kategori</option>
                @foreach ($daftarkategori as $kategori)
                    <option value="{{ $kategori->id}}" {{ $dataproduk->kategoriid==$kategori->id ? 'selected' : ''}}>{{ $kategori->namakategori}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Edit produk</button>
      </form>
      
</main>
@endsection
@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        
      </div>
      <div class="container" >
        <form action="kategoriproduk" method="post">
            @csrf
        <div class="mb-3">
            <label for="kodekatekogri" class="form-label">Kode Kategori</label>
            <input type="text" class="form-control @error('kodekategori') is-invalid @enderror" value="{{old ('kodekategori')}}" name="kodekategori" placeholder="Masukan Kode Kategori">
            @error ('kodekategori')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="namakategori" placeholder="Masukan Nama Kategori">
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Tambah Kategori</button>
      </form>
      
</main>
@endsection
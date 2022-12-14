@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
            <form onsubmit="if(!confirm('Apakah anda yakin?')){return false;}" action="{{url('kategoriproduk')}}" method="POST">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$datakategori -> id}}">
                <button type="submit" class="btn btn-danger btn-sm">Hapus Kategori</button>
            </form>
      </div>
      <div class="container" >
        <form action="{{url('kategoriproduk')}}" method="post">
            @method('patch')
            @csrf
        <input type="hidden" name="id" value="{{$datakategori -> id}}">
        <div class="mb-3">
            <label for="kodekatekogri" class="form-label">Kode Kategori</label>
            <input type="text" class="form-control @error('kodekategori') is-invalid @enderror" value="{{old ('kodekategori', $datakategori->kodekategori)}}" name="kodekategori" placeholder="Masukan Kode Kategori">
            @error ('kodekategori')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
        <div class="mb-3">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('namakategori') is-invalid @enderror" value="{{old ('namakategori', $datakategori->namakategori)}}" name="namakategori" placeholder="Masukan Nama Kategori">
            @error ('namakategori')<div class="invalid-feedback"> {{$message}} </div> @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Edit Kategori</button>
      </form>
      
</main>
@endsection
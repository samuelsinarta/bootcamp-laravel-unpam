@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <div class="container">
        <h1>{{$title}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori ID</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                    @php
                    if (request('page')) 
                        $baris = (request('page')-1)*10;
                    else 
                        $baris = 0;
                    @endphp
                    @foreach($daftarproduk as $produk)
                <tbody>
                <tr>
                    <td scope="row">{{ ++$baris }}</td>
                    <td>{{$produk->kodeproduk}}</td>
                    <td>{{$produk->namaproduk}}</td>
                    <td>{{$produk->kategori->namakategori}}</td>
                    <td><a href="{{url('editproduk')}}/{{$produk->id}}"><button type="button" class="btn btn-warning btn-sm">Edit Data</button></a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $daftarproduk -> links() }}
        <a href="{{url('addproduk')}}"><button type="button" class="btn btn-dark">Tambah Produk</button></a>
      </div>
</main>
@endsection
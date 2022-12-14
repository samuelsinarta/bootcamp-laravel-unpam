@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        <h1>{{$title}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                    @php
                    $baris=1
                    @endphp
                    @foreach($daftarkategori as $kategori)
                <tbody>
                <tr>
                    <td scope="row">{{ $baris++ }}</td>
                    <td>{{$kategori->kodekategori}}</td>
                    <td>{{$kategori->namakategori}}</td>
                    <td><a href="{{url('editkategori')}}/{{$kategori->id}}"><button type="button" class="btn btn-warning btn-sm">Edit Data</button></a></td>
                </tr>
            </tbody>
             @endforeach
        </table>
       <a href="{{url('addkategori')}}"><button type="button" class="btn btn-dark">Tambah Kategori</button></a> 
      </div>
      
</main>
@endsection
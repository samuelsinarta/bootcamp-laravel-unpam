<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>
        <div class="container">
            <h1>Laporan Produk</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Kategori ID</th>
                    </tr>
                    </thead>
                        @php 
                            $baris = 1;
                        @endphp
                        @foreach($daftarproduk as $produk)
                    <tbody>
                    <tr>
                        <td scope="row">{{ $baris++ }}</td>
                        <td>{{$produk->kodeproduk}}</td>
                        <td>{{$produk->namaproduk}}</td>
                        <td>{{$produk->kategori->namakategori}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
</main>
</body>
</html>
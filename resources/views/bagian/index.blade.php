@extends('layout.main')

@section('title', 'K4ntin')

@section('container-fluid')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kantin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/kantin">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kantin/vendor">Vendor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kantin/menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kantin/bagian">Bagian</a>
        </li>
      </ul>
    </div>
  </div>
</nav>  
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="mt-2">Master Tabel Bagian</h2>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Bagian</th>
                    <th scope="col">Lantai</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bagian as $ven)
                    <tr>
                    <th scope="row">{{$ven->id}}</th>
                        <td>{{$ven->kode_bagian }}</td>
                        <td>{{$ven->bagian}}</td>
                        <td>{{$ven->lantai}}</td>
                        <td>
                            <a href="/kantin/bagian/edit/{{$ven->id}}" class="btn btn-info">Ubah</a>
                            <form method="POST" action="/kantin/bagian/delete/{{$ven->id}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-warning">Hapus</button>
                            </form>
                        </td>        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/kantin/bagian/add" class="btn btn-success">+</a>   
        </div>
    </div>
</div>
@endsection
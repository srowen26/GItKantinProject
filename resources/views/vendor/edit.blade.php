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
      </ul>
    </div>
  </div>
</nav>  
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="mt-2">Edit Vendor</h2>
            <form method="POST" action="/kantin/vendor/{{$vendor->id}}">
            @method('patch')
            @csrf
            <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$vendor->nama}}" id="nama" >
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" name="kode" class="form-control" value="{{$vendor->kode}}" id="kode">
                </div>
                <div class="mb-3">
                    <label for="harga_katering_dasar" class="form-label">Harga Katering Dasar</label>
                    <input type="text" name="harga_katering_dasar" class="form-control" value="{{$vendor->harga_katering_dasar}}" id="harga_katering_dasar">
                </div>
                <div class="mb-3">
                    <label for="add_on" class="form-label">Add-On (Tambahan)</label>
                    <input type="text" name="add_on" class="form-control" value="{{$vendor->add_on}}" id="add_on">
                </div>
                <div class="mb-3">
                    <label for="harga_add_on" class="form-label">Harga Add-On</label>
                    <input type="text" name="harga_add_on" class="form-control" value="{{$vendor->harga_add_on}}" id="harga_add_on">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>
@endsection
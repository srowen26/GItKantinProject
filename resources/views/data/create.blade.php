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
            <h2 class="mt-2">Tambah Bagian</h2>
            <form method="POST" action="/kantin/bagian">
            @csrf
            <div class="mb-3">
                    <label for="kode_bagian" class="form-label">Kode Bagian</label>
                    <input type="text" name="kode_bagian" class="form-control"  id="kode_bagian" >
                </div>
                <div class="mb-3">
                    <label for="bagian" class="form-label">Nama Bagian</label>
                    <input type="text" name="bagian" class="form-control" id="bagian">
                </div>
                <div class="mb-3">
                    <label for="lantai" class="form-label">Lantai</label>
                    <input type="text" name="lantai" class="form-control" id="lantai">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>

@endsection
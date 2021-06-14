@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2 class="mt-2">Tambah Vendor</h2>
      <form method="POST" action="{{ route('vendor.store') }}">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama">
        </div>
        <div class="mb-3">
          <label for="kode" class="form-label">Kode</label>
          <input type="text" name="kode" class="form-control" id="kode">
        </div>
        <div class="mb-3">
          <label for="harga_katering_dasar" class="form-label">Harga Katering Dasar</label>
          <input type="text" name="harga_katering_dasar" class="form-control" id="harga_katering_dasar">
        </div>
        <div class="mb-3">
          <label for="add_on" class="form-label">Add-On (Tambahan)</label>
          <input type="text" name="add_on" class="form-control" id="add_on">
        </div>
        <div class="mb-3">
          <label for="harga_add_on" class="form-label">Harga Add-On</label>
          <input type="text" name="harga_add_on" class="form-control" id="harga_add_on">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection
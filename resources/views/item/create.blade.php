@extends('layout.main')

@section('title', 'K4ntin')
@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2 class="mt-2">Tambah Bagian</h2>
      <form method="POST" action="{{ route('item.store') }}">
        @csrf
        <div class="mb-3">
          <label for="menu_id" class="form-label">List Menu</label>
          <select class="form-select" name="menu_name" aria-label="Default select example">
            <option selected>Daftar Menu</option>
            @foreach ($data as $dat)
            <option>{{$dat->listmenu}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="item" class="form-label">Deskripsi Item</label>
          <input type="text" name="item" class="form-control" id="item">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection
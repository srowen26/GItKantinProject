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
            <h2 class="mt-2">Edit Bagian</h2>
            <form method="POST" action="{{ route('item.update', $item->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                    <label for="menu_id" class="form-label">List Menu</label>
                    <!-- <input type="text" name="menu_id" class="form-control" value="{{$item->menu_id}}" id="menu_id" > -->
                    <select class="form-select" name="menu_id" aria-label="Default select example">
                    <option selected>Daftar Menu</option>
                    @foreach ($item as $itm)
                    <option name="menu_id" value="{{$itm->menu_id}}">{{$itm->menu_id}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="item_desc" class="form-label">Deskripsi Item</label>
                    <input type="text" name="item_desc" class="form-control" value="{{$item->item_desc}}" id="item_desc">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>
@endsection
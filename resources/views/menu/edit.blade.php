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
            <h2 class="mt-2">Edit Master Menu</h2>
            <form method="POST" action="{{ route('menu.update', $menu->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                    <label for="kode_katering" class="form-label">Kode Katering</label>
                    <input type="text" name="kode_katering" class="form-control" value="{{$menu->kode_katering}}" id="kode_katering" >
                </div>
                <div class="mb-3">
                <label class="form-label">Hari</label>
                    <br/>
                    @foreach($menu->hari as $value)
                    <p>{{$menu['hari']}}</p>
                    <div class="form-check form-check-inline">
                        @if ($value === 'senin')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="senin">
                        @endif
                        <label class="form-check-label" >Senin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($value === 'selasa')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]" value="selasa">
                        @endif
                        <label class="form-check-label" >Selasa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($value === 'rabu')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="rabu">
                        @endif
                        <label class="form-check-label" >Rabu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($value === 'kamis')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]" value="kamis">
                        @endif
                        <label class="form-check-label" >Kamis</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($value === 'jumat')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]" value="jumat">
                        @endif
                        <label class="form-check-label" >Jumat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($value === 'sabtu')
                        <input class="form-check-input" type="checkbox" name="hari[]"  value="$value" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="hari[]" value="sabtu">
                        @endif
                        <label class="form-check-label" >Sabtu</label>
                    </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="menu_utama" class="form-label">Menu Utama</label>
                    <input type="text" name="menu_utama" class="form-control" value="{{$menu->menu_utama}}" id="menu_utama">
                </div>
                <div class="mb-3">
                    <label for="menu_add_on" class="form-label">Menu Add On</label>
                    <input type="text" name="menu_add_on" class="form-control" value="{{$menu->menu_add_on}}" id="menu_add_on">
                </div>
                <div class="mb-3">
                    <label for="harga_add_on" class="form-label">Harga Add On</label>
                    <input type="text" name="harga_add_on" class="form-control" value="{{$menu->harga_add_on}}" id="harga_add_on">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
        </div>
    </div>
</div>
@endsection
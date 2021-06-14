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
            <h2 class="mt-2">Tambah Master Menu</h2>
            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="kode_katering" class="form-label">Kode Katering</label>
                    <input type="text" name="kode_katering" class="form-control" id="kode_katering">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <br />
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="senin">
                        <label class="form-check-label">Senin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="selasa">
                        <label class="form-check-label">Selasa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="rabu">
                        <label class="form-check-label">Rabu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="kamis">
                        <label class="form-check-label">Kamis</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="jumat">
                        <label class="form-check-label">Jumat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="sabtu">
                        <label class="form-check-label">Sabtu</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="menu_utama" class="form-label">Menu Utama</label>
                    <!-- <input type="text" name="menu_utama" class="form-control" id="menu_utama"> -->
                    <select id="my-select" name="menu_utama[]" multiple="multiple">
                        @foreach ($item as $itm)
                        <optgroup label="{{ $itm->menu_name }}">
                            <option value="{{ $itm->menu_name }} - {{ $itm->item }}">{{ $itm->item }}</option>
                        </optgroup>
                        @endforeach

                    </select>         
                </div>
                <div class="mb-3">
                    <label for="menu_add_on" class="form-label">Menu Add On</label>
                    <input type="text" name="menu_add_on" class="form-control" id="menu_add_on">
                </div>
                <div class="mb-3">
                    <label for="harga_add_on" class="form-label">Harga Add On</label>
                    <input type="text" name="harga_add_on" class="form-control" id="harga_add_on">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
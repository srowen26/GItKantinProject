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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master Data
          </a>
          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/kantin/data">Data</a></li>
            <li><a class="dropdown-item" href="/kantin/item">Item</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-">
            <h2 class="mt-2">Master Tabel Menu</h2>
            
            <br/>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Menu Utama</th>
                    <th scope="col">Menu Add-On</th>
                    <th scope="col">Harga Add-On</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $menu)
                    <tr>
                    <th scope="row">{{$menu->id}}</th>
                        <td>{{$menu->kode_katering}}</td>
                        <td>@foreach($menu->hari as $value)
                                {{$value}} 
                            @endforeach
                        </td>  
                        <td>@foreach($$menu->menu_utama as $value)
                                {{$value}}<br/>
                            @endforeach
                        </td>
                        <td>{{$menu->menu_add_on}}</td>
                        <td>{{$menu->harga_add_on}}</td>
                        <td>
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-info">Ubah</a>
                            <form method="POST" action="{{ route('menu.destroy',$menu->id) }}">
                            @method('delete')
                            @csrf
                             <button type="submit" class="btn btn-warning">Hapus</button> 
                            </form>
                        </td>        
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <a href="{{ route('menu.create') }}" class="btn btn-success">+</a> 
        </div>
    </div>
</div>
@endsection
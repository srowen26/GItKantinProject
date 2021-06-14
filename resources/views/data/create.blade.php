@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="mt-2">Tambah Data Menu</h2>
            <form method="POST" action="{{ route('data.store') }}">
            @csrf
            <div class="mb-3">
                    <label for="listmenu" class="form-label">List Menu</label>
                    <input type="text" name="listmenu" class="form-control"  id="listmenu" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>

@endsection
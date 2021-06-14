@extends('layout.main')

@section('title', 'K4ntin')
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
                    <!-- <input type="text" name="menu_id" class="form-control" value="{{$item->menu_id}}" id="menu_id"> -->
                    <select class="form-select" name="menu_id" aria-label="Default select example">
                    @foreach ($data as $dat)
                    <option name="menu_id" value="{{$dat->id}}">{{$dat->listmenu}}</option>
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
@extends('layout.main')

@section('title', 'K4ntin')

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
                    <input type="text" name="kode_katering" class="form-control" value="{{$menu->kode_katering}}" id="kode_katering">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label><br />
                    <?php
                    $senin = '';
                    $selasa = '';
                    $rabu = '';
                    $kamis = '';
                    $jumat = '';
                    $sabtu = '';
                    ?>

                    @foreach($menu->hari as $value)
                    @if($value == 'senin')
                    @php $senin = $value @endphp
                    @elseif($value == 'selasa')
                    @php $selasa = $value @endphp
                    @elseif($value == 'rabu')
                    @php $rabu = $value @endphp
                    @elseif($value == 'kamis')
                    @php $kamis = $value @endphp
                    @elseif($value == 'jumat')
                    @php $jumat = $value @endphp
                    @elseif($value == 'sabtu')
                    @php $sabtu = $value @endphp
                    @endif
                    @endforeach

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="senin" {{$senin == 'senin' ? 'checked' : null}}>
                        <label class="form-check-label">Senin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="selasa" {{$selasa == 'selasa' ? 'checked' : null}}>
                        <label class="form-check-label">Selasa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="rabu" {{$rabu == 'rabu' ? 'checked' : null}}>
                        <label class="form-check-label">Rabu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="kamis" {{$kamis == 'kamis' ? 'checked' : null}}>
                        <label class="form-check-label">Kamis</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="jumat" {{$jumat == 'jumat' ? 'checked' : null}}>
                        <label class="form-check-label">Jumat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hari[]" value="sabtu" {{$sabtu == 'sabtu' ? 'checked' : null}}>
                        <label class="form-check-label">Sabtu</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="menu_utama" class="form-label">Menu Utama</label>
                    <select id="menu-select" name="menu_utama[]" multiple="multiple">
                        @foreach ($item as $itm)
                        <optgroup label="{{ $itm->menu_name }}">
                            <option value="{{ $itm->menu_name }} - {{ $itm->item }}">{{ $itm->item }}</option>
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="menu_add_on" class="form-label">Menu Add On</label>
                    <select id="add-select" name="menu_add_on[]" multiple="multiple">
                        @foreach ($item as $itm)
                        <optgroup label="{{ $itm->menu_name }}">
                            <option value="{{ $itm->menu_name }} - {{ $itm->item }}">{{ $itm->item }}</option>
                        </optgroup>
                        @endforeach
                    </select>
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
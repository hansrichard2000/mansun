@extends('layouts.beranda')

@section('judul')
    Edit Periode
@endsection

@section('judul-top')
    Edit Periode
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.periode.update', $periode)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="tahun_periode">Tahun Periode :</label>
                <input type="text" class="form-control" value="{{$periode->tahun_periode}}" id="tahun_periode" name="tahun_periode" required>
            </div>
            <div class="form-group">
                <label for="gambar_periode">Gambar Periode :</label>
                <input type="file" class="form-control-file" value="{{$periode->gambar_periode}}" id="gambar_periode" name="gambar_periode">
            </div>
            <div class="form-group">
                <label for="nilai">Nilai :</label>
                <select name="nilai" class="custom-select">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            </div>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
    </div>
@endsection

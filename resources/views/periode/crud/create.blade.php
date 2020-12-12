@extends('layouts.beranda')

@section('judul')
    Tambah Periode
@endsection

@section('judul-top')
    Tambah Periode
@endsection

@section('content')
    <div class="container">
        <form action="{{route('periode.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tahun_periode">Tahun Periode :</label>
                <input type="text" class="form-control" id="tahun_periode" name="tahun_periode">
            </div>
            <div class="form-group">
                <label for="gambar_periode">Gambar Periode :</label>
                <input type="file" class="form-control-file" id="gambar_periode" name="gambar_periode">
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
                <select name="created_by" class="custom-select">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->mahasiswa_id}}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
    </div>
@endsection

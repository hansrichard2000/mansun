@extends('layouts.beranda')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    Admin Area
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">

        </div>

        {{--                    Foto Profil--}}
        <div style="width: 35%; height: 300px; border: #1789fc solid 3px; border-radius: 30px">
            <img src="{{asset('image/group92.jpg')}}" style="width: 150px;height: 150px; border-radius: 50%; margin: 15% 28.5% 5% 28.5%">
            <a href="{{route('login')}}" style="background-color: #1789FC; padding: 4px 8px 4px 8px; color: white; margin: 0 36.5% 0 36.5%; border-radius: 10px">Ganti Foto</a>
        </div>

        {{--                    Biodata--}}
        <div style="width: 60%; height: 300px; border: dodgerblue solid 3px; border-radius: 30px">
            <div style="background-color: #1789FC; border-radius: 26px 26px 0px 0px; color: white; padding: 8px 0 8px 20px">Nama Mahasiswa</div>
            <div style="margin-left: 20px; margin-top: 10px">Email :</div>
            <div style="margin-left: 20px; margin-top: 10px">mahasiswa@student.ciputra.ac.id</div>
            <div style="margin-left: 20px; margin-top: 10px">Program Studi :</div>
            <div style="margin-left: 20px; margin-top: 10px">Informatika</div>
            <div style="margin-left: 20px; margin-top: 10px">No Telp :</div>
            <div style="margin-left: 20px; margin-top: 10px">082112345678</div>
            <div style="margin-left: 20px; margin-top: 10px">NIM :</div>
            <div style="margin-left: 20px; margin-top: 10px">0706011910099</div>
        </div>

        <br>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Riwayat Jabatan</h3>
        </div>
        <hr class="garisKuning">
        <div class="row">
            {{--                        @foreach()--}}
            <div class="col">
                <div class="card bg-light daftar-periode" style="border: dodgerblue solid 3px; border-radius: 30px">
                    <img src="{{asset('image/group92.jpg')}}" class="card-img" alt="..." style="border-radius: 26px 26px 0px 0px">
                    <div>
                        <h5 style="margin-left: 10px">Nama Acara</h5>
                        <h5 style="margin-left: 10px; font-weight: bold">Jabatan</h5>
                        <h5 style="margin-left: 10px">5.0</h5>
                        <h5 style="margin-left: 10px">1 Januari 2020 - 31 Desember 2020</h5>
                    </div>
                </div>

            </div>
            {{--                        @endforeach--}}
        </div>
        <div class="row">

        </div>

    </div>
@endsection

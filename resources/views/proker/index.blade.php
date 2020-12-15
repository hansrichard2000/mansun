<!DOCTYPE html>
<?php
//use App\Models\Periode;
//use Illuminate\Support\Facades\Auth;
//
//$current_user = Periode::all()->where('id', Auth::user()->mahasiswa_id);
//
?>

@extends('layouts.beranda')

@section('judul')
    Daftar Proker
@endsection

@section('judul-top')
    Daftar Proker
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <div class="card">
                <div class="card-body">
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#68CC2A"/>
                    </svg>
                    <p class="float-left">Berlangsung &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#FF2828"/>
                    </svg>
                    <p class="float-left">Selesai &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#2A65FC"/>
                    </svg>
                    <p class="float-left">Belum dimulai &emsp;</p>
                </div>
            </div>
            @foreach($periodes as $periode)
{{--                {{$current_periode = $periode}}--}}
            @endforeach
{{--            {{dd($periode->id)}}--}}
            <form method="POST">
{{--                Kalau pake $periodes[0], dia cuma bisa buka proker ke 0--}}
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('proker.create', $periode->id)}}">&nbsp;Tambah Proker</a>
            </form>
        </div>
        <hr class="garisKuning">
        <div class="row row-cols-3 mt-3">

            @foreach($prokers as $proker)
            <div class="col">
                <a href="{{route('proker.show', $proker->id)}}">
                    <div class="card">
                        <img src="{{asset('image/group92.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 ml-3" >
                            <p class="card-text"><strong>{{$proker->nama_proker}}</strong></p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
@endsection

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
                        <rect width="20" height="20" fill="#FF2828"/>
                    </svg>
                    <p class="float-left">Belum dimulai &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#2A65FC"/>
                    </svg>
                    <p class="float-left">Berlangsung &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#68CC2A"/>
                    </svg>
                    <p class="float-left">Selesai &emsp;</p>
                </div>
            </div>

            {{--Ini buat ngecek apakah user itu isadmin pada periode itu--}}
            @foreach($periodes as $periode)
                @auth
                    @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                        <form method="POST">
                            <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.proker.createProker', $periode->id)}}">&nbsp;Tambah Proker</a>
                        </form>
                    @endif
                @endauth
            @endforeach

        </div>
        <hr class="garisKuning">
        <div class="row row-cols-3">

            @foreach($prokers as $proker)

            {{--Proker Belum dimulai--}}
            @if($proker->status_proker_id == 1)
            <div class="col mt-3 mb-3">
                <a href="@auth
                    @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                        {{route('admin.proker.show', $proker->id)}}
                    @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                        {{route('user.proker.show', $proker->id)}}
                    @endif
                @endauth">
                    <div class="card">
                        @if($proker->gambar_proker == null)
                            <img src="{{asset('image/group92.jpg')}}" class="card-img-top img-fluid" style="height: 180px; padding-right: 15px; background-color: #FF2828">
                        @else
                            <img src="../../image/prokerImg/{{$proker->gambar_proker}}" class="card-img-top img-fluid" style="height: 180px; padding-right: 5%; background-color: #FF2828">
                        @endif
                        <div class="card-body p-0 ml-3" >
                            <p class="card-text p-2"><strong>{{$proker->nama_proker}}</strong></p>
                        </div>
                    </div>
                </a>
            </div>

                    {{--Proker Sedang Berlangsung--}}
                @elseif($proker->status_proker_id == 2)
                    <div class="col mt-3 mb-3">
                        <a href="@auth
                            @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                {{route('admin.proker.show', $proker->id)}}
                            @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                                {{route('user.proker.show', $proker->id)}}
                            @endif
                        @endauth">
                            <div class="card">
                                @if($proker->gambar_proker == null)
                                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top img-fluid" style="height: 180px;padding-right: 15px; background-color: #2A65FC">
                                @else
                                    <img src="../../image/prokerImg/{{$proker->gambar_proker}}" class="card-img-top img-fluid" style="height: 180px; padding-right: 5%; background-color: #2A65FC">
                                @endif
                                <div class="card-body p-0 ml-3" >
                                    <p class="card-text p-2"><strong>{{$proker->nama_proker}}</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{--Proker Selesai--}}
                @else
                    <div class="col mt-3 mb-3">
                        <a href="@auth
                            @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                {{route('admin.proker.show', $proker->id)}}
                            @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                                {{route('user.proker.show', $proker->id)}}
                            @endif
                        @endauth">
                            <div class="card">
                                @if($proker->gambar_proker == null)
                                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top img-fluid" style="height: 180px; padding-right: 15px; background-color: #68CC2A">
                                @else
                                    <img src="../../image/prokerImg/{{$proker->gambar_proker}}" class="card-img-top img-fluid" style="height: 180px; padding-right: 5%; background-color: #68CC2A">
                                @endif
                                <div class="card-body p-0 ml-3" >
                                    <p class="card-text p-2"><strong>{{$proker->nama_proker}}</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection

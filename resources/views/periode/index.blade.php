@extends('layouts.beranda')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    Beranda
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Terakhir Dilihat</h3>
        </div>
        <hr class="garisKuning">
        <div class="last-page row">
            @if($periodes != null)
                <div class="card" style="width: 30em;height: 18em">
                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body p-0 ml-3" >
                        <p class="card-text"><strong>Nama Periode</strong></p>
                    </div>
                </div>
            @else
                No Record
            @endif
        </div>
        <br>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Daftar Periode</h3>
            <form method="GET" action="{{route('periode.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('periode.create')}}">&nbsp;Tambah Periode</a>
            </form>
        </div>
        <hr class="garisKuning">
        <div class="row row-cols-3">
            @if($periodes != null)
                @foreach($periodes as $periode)
                    <div class="col ml-3">
                        <a href="{{route('proker.index', $periode->id)}}">
                            <div class="card">
                                @if($periode->gambar_periode == null)
                                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top">
                                @else
                                    <img src="image/periodeImg/{{$periode->gambar_periode}}" class="card-img-top" style="height: 225.85px; width: 430px;">
                                @endif
                                <div class="card-body p-0 ml-3" >
                                    <p class="card-text"><strong>{{$periode->tahun_periode}}</strong></p>
                                    <p class="card-text"><strong>Nilai : {{$periode->nilai}}</strong></p>
                                </div>

                            </div>
                        </a>

                    </div>
                @endforeach
            @else
                no record
            @endif
        </div>
        <br><br>
    </div>
@endsection

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
            <div class="card" style="width: 30em;height: 18em">
                <img src="{{asset('image/group92.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body p-0 ml-3" >
                    <p class="card-text"><strong>Nama Periode</strong></p>
                </div>
            </div>
        </div>
        <br>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Daftar Periode</h3>
            <form method="GET" action="{{route('periode.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('periode.create')}}">&nbsp;Tambah Periode</a>
            </form>
        </div>
        <hr class="garisKuning">
        <div class="row">
            {{--                        @foreach()--}}
            <div class="col ml-3">
                <a href="#">
                    <div class="card" style="width: 30em;height: 18em">
                        <img src="{{asset('image/group92.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 ml-3" >
                            <p class="card-text"><strong>Nama Periode</strong></p>
                        </div>
                    </div>
                </a>

            </div>
            {{--                        @endforeach--}}
        </div>
        <br><br>
    </div>
@endsection

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
            <form method="GET" action="{{route('admin.periode.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.periode.create')}}">&nbsp;Tambah Periode</a>
            </form>
        </div>
        <hr class="garisKuning">
        <div class="row row-cols-3">
            @if($periodes != null)
                @foreach($periodes as $periode)
                    <div class="col mt-3">
                        <a href="{{route('admin.periode.show', $periode->id)}}">
                            <div class="card">
                                @if($periode->gambar_periode == null)
                                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top img-fluid" style="height: 180px">
                                @else
                                    <img src="../image/periodeImg/{{$periode->gambar_periode}}" class="card-img-top img-fluid" style="height: 180px">
                                @endif
                                <div class="card-body p-0 ml-3" >
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <p class="card-text"><strong>{{$periode->tahun_periode}}</strong></p>
                                            <p class="card-text"><strong>Nilai : {{$periode->nilai}}</strong></p>
                                        </div>
                                        <div class="col">
                                                <div class="nav-item dropdown no-arrow float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                                        <form action="{{route('admin.periode.edit', $periode)}}" method="GET">
                                                            @csrf
                                                            <input type="submit" id="submit" name="submit" value="Edit" class="btn bg-mansun-blue text-white float-left mr-5">
                                                        </form>

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
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

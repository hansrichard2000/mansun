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
            <h3 class="text-dark mb-0">Daftar Periode</h3>
            @auth
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    <form method="GET" action="{{route('admin.periode.create')}}">
                        <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.periode.create')}}">&nbsp;Tambah Periode</a>
                    </form>
                @endif
            @endauth
        </div>
        <hr class="garisKuning">
        <div class="row row-cols-3">
            @if($periodes != null)
                @foreach($periodes as $periode)
                    <div class="col mt-3">
                        @auth
                            @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                <a href="{{route('admin.periode.show', $periode->id)}}">
                            @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                                        <a href="{{route('user.periode.show', $periode->id)}}">
                            @endif
                        @endauth
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
                                        @auth
                                            @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                                <div class="col">
                                                    <div class="nav-item dropdown no-arrow float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                                <form action="{{route('admin.periode.edit', $periode)}}" method="GET">
                                                                    @csrf
                                                                    <input type="submit" id="submit" name="submit" value="Edit" class="btn bg-mansun-blue text-white mr-5">
                                                                </form>
                                                                <form action="{{route('admin.periode.destroy', $periode)}}" method="POST">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <input type="submit" id="submit" name="submit" value="Delete" class="btn btn-danger text-white mr-5">

                                                                </form>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endauth
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

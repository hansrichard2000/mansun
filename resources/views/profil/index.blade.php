@extends('layouts.profil')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    Admin Area
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        @foreach($current_user as $user)
                            @if($user->photo == null)
                                <img class="rounded-circle mb-3 mt-4" src="{{asset('../image/profile/profil.png')}}" width="160" height="160">
                            @else
                                <img class="rounded-circle mb-3 mt-4" src="../assets/img/avatars/{{$user->photo}}" width="160" height="160">
                            @endif
                        @endforeach
{{--                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            @foreach($current_user as $user)
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold"><strong>{{$user->name}}</strong></p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Email</strong></label><div>{{$user->email}}</div></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="email"><strong>Program Studi</strong></label><div>{{$user->department['name']}}</div></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="first_name"><strong>No telp</strong></label><div>{{$user->phone}}</div></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>NIM</strong></label><div>{{$user->nim}}</div></div>
                                        </div>
                                    </div>
{{--                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>--}}
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @auth
            @if(\illuminate\Support\Facades\Auth::user()->isUser())
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Riwayat Jabatan</p>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-2">
                            @foreach($dvs as $riwayat)
                            <div class="col-md-6">
                                <div class="card float-left" style="width: 30em;height: 18em">
                                    <img src="{{asset('image/group92.jpg')}}" class="card-img-top" style="height: 180px">
                                    <div class="card-body p-0 ml-3" >
                                        <strong>{{$riwayat->divisi->proker->nama_proker}}</strong>
                                        @if($riwayat->role->role == "HOD")
                                            <h4 class="card-text"><strong>Head of Department</strong></h4>
                                        @elseif($riwayat->role == "Koor")
                                            <h4 class="card-text"><strong>Koor {{$riwayat->divisi->nama_divisi}}</strong></h4>
                                        @else
                                            <h4 class="card-text"><strong>Anggota {{$riwayat->divisi->nama_divisi}}</strong></h4>
                                        @endif
                                        <strong>{{date('j F Y', strtotime($riwayat->divisi->proker->tanggal_mulai))}} - {{date('j F Y', strtotime($riwayat->divisi->proker->tanggal_akhir))}}</strong>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection

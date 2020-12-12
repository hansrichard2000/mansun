@extends('layouts.beranda')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    User Management
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex justify-content-between align-items-center mb-4">

{{--            Search Bar--}}
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                       aria-label="Search">
            </form>

{{--            Add button--}}
            <form method="GET" action="{{route('periode.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('user.create')}}">&nbsp;Tambah User</a>
            </form>
        </div>

{{--        TABEL MAHASISWA--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Mahasiswa</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

{{--            HANYA CONTOH DATA--}}
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">Angkatan</th>
                <th scope="col">NIM</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Mahasiswa 1</th>
                <td>IMT</td>
                <td>2019</td>
                <td>0706011910099</td>
                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 42%"></div></td>
                <td>Active</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
            <tr>
                <th scope="row">Mahasiswa 2</th>
                <td>IMT</td>
                <td>2018</td>
                <td>0706011910046</td>
                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 42%"></div></td>
                <td style="color: red;">Suspended</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
            <tr>
                <th scope="row">Mahasiswa 3</th>
                <td>IMT</td>
                <td>2019</td>
                <td>0706011910083</td>
                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 42%"></div></td>
                <td>Active</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
            </tbody>
        </table>

{{--        TABEL DOSEN--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Dosen</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

            {{--            HANYA CONTOH DATA--}}
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">NIP</th>
                <th scope="col">NIDN</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Dosen 1</th>
                <td>IMT</td>
                <td>7892465276838</td>
                <td>8728765484837</td>
                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                <td>Active</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
            <tr>
                <th scope="row">Dosen 2</th>
                <td>IMT</td>
                <td>9827346327434</td>
                <td>2465298327453</td>
                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                <td>Active</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>            </tr>
            <tr>
                <th scope="row">Dosen 3</th>
                <td>IMT</td>
                <td>2834659823884</td>
                <td>9823746783477</td>
                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                <td>Active</td>
                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

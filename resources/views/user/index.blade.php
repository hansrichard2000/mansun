@extends('layouts.userManagement')

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
            <form method="GET" action="{{route('user.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('user.create')}}">&nbsp;Tambah User</a>
            </form>
        </div>

{{--        TABEL MAHASISWA--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Students</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Batch</th>
                <th scope="col">NIM</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
            <tr>
                <th scope="row">{{$mahasiswa->name}}</th>
                <td>{{$mahasiswa->department_id}}</td>
                <td>{{$mahasiswa->batch}}</td>
                <td>{{$mahasiswa->nim}}</td>

                @if($mahasiswa->is_login == 0)
                    <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                @elseif($mahasiswa->is_login == 1)
                    <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                @endif

                @if($mahasiswa->is_active == 0)
                    <td style="color: red">Suspended</td>
                @elseif($mahasiswa->is_active == 1)
                    <td>Active</td>
                @endif

                <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                    @include('user.detail')</td>
            </tr>
                @endforeach
            </tbody>
        </table>

{{--        TABEL DOSEN--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Lecturers</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

            <tr>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">NIP</th>
                <th scope="col">NIDN</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                        <tr>
                            <th scope="row">{{$dosen->name}}</th>
                            <td>{{$dosen->department_id}}</td>
                            <td>{{$dosen->nip}}</td>
                            <td>{{$dosen->nidn}}</td>

                            @if($dosen->is_login == 0)
                                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                            @elseif($dosen->is_login == 1)
                                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                            @endif

                            @if($dosen->is_active == 0)
                                <td style="color: red">Suspended</td>
                            @elseif($dosen->is_active == 1)
                                <td>Active</td>
                            @endif

                            <td><button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                        data-toggle="modal"
                                        data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                @include('user.detail')</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

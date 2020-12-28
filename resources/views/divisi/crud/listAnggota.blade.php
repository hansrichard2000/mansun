@extends('layouts.beranda')

@section('judul')
    List Anggota
@endsection

@section('judul-top')
    Lihat Daftar Anggota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0 ml-3">{{$member->nama_divisi}}</h3>
            @auth
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#createAnggota">Tambah Anggota</button>
                    @include('divisi.crud.tambahAnggota')
                @endif
            @endauth
        </div>
        <hr class="garisKuning">
        <div class="row m-1">
            <table class="table table-striped">
                <thead class="bg-mansun-blue text-white">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">email</th>
                    <th scope="col">Role</th>
                    @auth
                        @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                            <th scope="col">Action</th>
                        @endif
                    @endauth
                </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
{{--                        {{dd($member->user)}}--}}
                        <tr class="text-center">
                            <td>{{$member->user->id}}</td>
                            <td>{{$member->user->student['name']}}</td>
                            <td>{{$member->user->email}}</td>
                            <td>{{$member->role->role}}</td>
                            @auth
                                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <td>
                                        <form action="" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="type" type="hidden" value="mahasiswa">
                                            <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                        </form>
                                    </td>
                                @endif
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

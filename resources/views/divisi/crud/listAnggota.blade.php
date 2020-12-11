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
            <h3 class="text-dark mb-0 ml-3">Nama Divisi</h3>
            <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                    data-toggle="modal"
                    data-target="#create">Tambah Anggota</button>
        </div>
        <hr class="garisKuning">
        <div class="row m-1">
            <table class="table table-striped">
                <thead class="bg-mansun-blue text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.beranda')

@section('judul')
    Tambah Proker
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tambah Program Kerja</h3>

        </div>
        <hr class="garisKuning">
        <form method="POST" action="{{route('proker.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <select name="periode_id" class="custom-select">
                    @foreach ($periodes as $periode)
                        <option value="{{$periode->id}}">{{$periode->tahun_periode}}</option>
                    @endforeach
                </select>

{{--                <input type hidden name="periode_id" value="{{$periodes[]}}">--}}
            </div>
            <div class="form-group">
                <label for="nama_proker">Nama Program Kerja : </label>
                <input type="text" class="form-control" id="nama_proker" name="nama_proker" placeholder="Input nama program kerja yang akan diisi...">
            </div>
            <div class="form-group">
                <label for="deskripsi_proker">Deskripsi : </label>
                <textarea rows="4" class="form-control" id="deskripsi_proker" name="deskripsi_proker"></textarea>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai : </label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="name@example.com" value="tanggalmulai">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Berakhir : </label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="name@example.com" value="tanggalakhir">
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-group">
                        <label for="pemasukkan">Pemasukkan : </label>
                        <input type="number" class="form-control" id="pemasukkan" name="pemasukkan" placeholder="Total pemasukkan..." value="pemasukan">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="pengeluaran">Pengeluaran : </label>
                        <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="Total pengeluaran..." value="pengeluaran">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="medos">Akun Instagram : </label>
                <input type="text" class="form-control" id="medsos" name="medsos" placeholder="Input username account instagram proker kalian...">
            </div>
            <div class="form-group">
                <label for="proposal">Link Proposal : </label>
                <input type="text" class="form-control" id="proposal" name="proposal" placeholder="Input link proposal kalian...">
            </div>
            <div class="form-group">
                <label for="lpj">Link Laporan Pertanggung Jawaban: </label>
                <input type="text" class="form-control" id="lpj" name="lpj" placeholder="Input nama program kerja yang akan diisi...">
            </div>
            <div class="form-group">
{{--                <label for="temp">created_by: (temporary)</label>--}}
                <select name="created_by" class="custom-select">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->student_id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gambar_proker">Thumbnail : </label>
                <input type="file" class="form-control-file" id="gambar_proker" name="gambar_proker">
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-group">
                        <label for="status_proker_id">Status Acara</label>
                        <select class="form-select" id="status_proker_id" name="status_proker_id" aria-label="Floating label select example">
                            @foreach ($status_prokers as $status_proker)
                                <option value="{{$status_proker->id}}">{{$status_proker->statusproker}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br>
    </div>
@endsection

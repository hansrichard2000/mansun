@extends('layouts.beranda')

@section('judul')
    Tambah Proker
@endsection

@section('judul-top')
    Tambah Proker
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tambah Tugas</h3>

        </div>
        <hr class="garisKuning">
        <form method="POST" action="">
            <div class="form-group">
                <label for="judul">Judul Tugas : </label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Input nama program kerja yang akan diisi...">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi : </label>
                <textarea rows="3" class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Tenggat Waktu : </label>
                <input type="date" class="form-control" id="deadline" name="deadline">
            </div>
            <div class="form-group">
                <label for="link_hasil_kerja">Link Hasil Kerja : </label>
                <input type="text" class="form-control" id="link_hasil_kerja" name="link_hasil_kerja" placeholder="Input link proposal kalian...">
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-group">
                        <label for="status_task_id">Status Acara</label>
                        <select class="form-select" id="status_task_id" name="status_task_id" aria-label="Floating label select example">
                            <option value="1" selected>Not Submitted</option>
                            <option value="2">Submitted</option>
                            <option value="3">Approved</option>
                            <option value="4">Rejected</option>
                        </select>

                    </div>
                </div>
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="#">&nbsp;Tambah Tugas</a>
                </div>

            </div>
        </form>
    </div>
@endsection

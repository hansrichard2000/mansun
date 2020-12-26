@extends('layouts.beranda')

@section('judul')
    Edit Tugas
@endsection

@section('judul-top')
    Edit Tugas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">{{$task->divisi->nama_divisi}}</h3>
        </div>
        <hr class="garisKuning">
        <form method="POST" action="{{route('admin.task.update', $task)}}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="divisi_id" value="{{$task->divisi_id}}">
            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <select class="form-select" id=penanggung_jawab"" name="penanggung_jawab" aria-label="Floating label select example">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="judul">Judul Tugas : </label>
                <input type="text" class="form-control" value="{{$task->judul}}" id="judul" name="judul" placeholder="Input nama program kerja yang akan diisi...">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi : </label>
                <textarea rows="3" class="form-control" id="deskripsi" name="deskripsi">{{$task->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Tenggat Waktu : </label>
                <input type="date" class="form-control" value="{{$task->deadline}}" id="deadline" name="deadline">
            </div>
            <div class="form-group">
                <label for="link_hasil_kerja">Link Hasil Kerja : </label>
                <input type="text" class="form-control" value="{{$task->link_hasil_kerja}}" id="link_hasil_kerja" name="link_hasil_kerja" placeholder="Input link proposal kalian...">
            </div>
            {{--            <div class="row g-2">--}}
            {{--                <div class="col-md">--}}
            {{--                    <div class="form-group">--}}
            {{--                        <label for="status_task_id">Status Acara</label>--}}
            {{--                        <select class="form-select" id="status_task_id" name="status_task_id" aria-label="Floating label select example">--}}
            {{--                            @foreach ($status_tasks as $status_task)--}}
            {{--                                <option value="{{$status_task->id}}">{{$status_task->statustask}}</option>--}}
            {{--                            @endforeach--}}
            {{--                        </select>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            <div class="form_group">
                <select name="created_by" class="custom-select">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->id}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            {{--            </div>--}}
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection
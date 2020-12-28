@extends('layouts.beranda')

@section('judul')
    Tambah Tugas
@endsection

@section('judul-top')
    Tambah Tugas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">{{$divisis->nama_divisi}}</h3>

        </div>
        <hr class="garisKuning">
        <form method="POST" action="
            @auth
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    {{route('admin.task.store')}}
                @elseif(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    {{route('user.task.store')}}
                @endif
            @endauth">
            @csrf
            <input type="hidden" value="{{$divisis->id}}" id="divisi_id" name="divisi_id">
            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <select class="form-select" id=penanggung_jawab"" name="penanggung_jawab" aria-label="Floating label select example">
                    @foreach ($users as $user)
                        @if(isset($user->student))
                            <option value="{{$user->id}}">{{$user->student['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
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
            <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <br>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection

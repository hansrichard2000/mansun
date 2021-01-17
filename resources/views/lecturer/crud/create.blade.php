@extends('layouts.lecturer')

@section('judul')
    Tambah Dosen
@endsection

@section('judul-top')
    Tambah Dosen <p style="color: red">(Admin Mode)</p>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{route('admin.lecturer.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="name" placeholder="Input nama dosen">
            </div>
            <div class="form-group">
                <label for="nip">NIP : </label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Input nomor induk pengajar">
            </div>
            <div class="form-group">
                <label for="nim">NIDN : </label>
                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Input nomor induk dosen nasional">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin : </label><br>
                <input type="radio" id="L" name="gender" value="L">
                <label for="L">Laki-laki</label><br>
                <input type="radio" id="P" name="gender" value="P">
                <label for="P">Perempuan</label><br>
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Input email dosen" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone : </label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Input nomor telepon dosen">
            </div>
            <div class="form-group">
                <label for="line_account">Line Account : </label>
                <input type="text" class="form-control" id="line_account" name="line_account" placeholder="Input ID Line dosen">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi : </label>
                <textarea rows="3" class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto : </label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="department">Jurusan : </label><br>
                <select class="form-select" id="department" name="department_id" aria-label="Floating label select example">
                    @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->initial}} ({{$department->name}})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Gelar : </label><br>
                <select class="form-select" id="title" name="title_id" aria-label="Floating label select example">
                    @foreach($titles as $title)
                        <option value="{{$title->title_id}}">{{$title->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jaka">Jabatan Akademik : </label><br>
                <select class="form-select" id="jaka" name="jaka_id" aria-label="Floating label select example">
                    @foreach($jakas as $jaka)
                        <option value="{{$jaka->jaka_id}}">{{$jaka->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection

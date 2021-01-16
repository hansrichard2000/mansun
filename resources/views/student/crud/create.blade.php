@extends('layouts.student')

@section('judul')
    Tambah Mahasiswa
@endsection

@section('judul-top')
    Tambah Mahasiswa <p style="color: red">(Admin Mode)</p>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{route('admin.student.store')}}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="name" placeholder="Input nama mahasiswa">
            </div>
            <div class="form-group">
                <label for="nim">NIM : </label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Input nomor induk mahasiswa">
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
                <input type="email" class="form-control" id="email" name="email" placeholder="Input email mahasiswa">
            </div>
            <div class="form-group">
                <label for="phone">Phone : </label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Input nomor telepon mahasiswa">
            </div>
            <div class="form-group">
                <label for="line_account">Line Account : </label>
                <input type="text" class="form-control" id="line_account" name="line_account" placeholder="Input ID Line mahasiswa">
            </div>
            <div class="form-group">
                <label for="batch">Batch : </label>
                <input type="number" class="form-control" id="batch" name="batch" placeholder="Input tahun angkatan mahasiswa">
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
            <br>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection

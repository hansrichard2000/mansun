@extends('layouts.beranda')

@section('judul')
    Tambah Periode
@endsection

@section('judul-top')
    Tambah User
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){

        $("#dropdown_dosen").hide();

        $("#tipe_mahasiswa").click(function(){
            document.getElementById("dd_mahasiswa").disabled = false;
            document.getElementById("dd_dosen").disabled = true;

            $("#dropdown_mahasiswa").show();
            $("#dropdown_dosen").hide();
        });
        $("#tipe_dosen").click(function(){
            document.getElementById("dd_dosen").disabled = false;
            document.getElementById("dd_mahasiswa").disabled = true;

            $("#dropdown_dosen").show();
            $("#dropdown_mahasiswa").hide();
        });
    });
</script>

@section('content')
    <div class="container">

        <label for="tipe_user">Jenis User :</label><br>
        <button id="tipe_mahasiswa" class="btn bg-mansun-blue text-white">Mahasiswa</button>
        <button id="tipe_dosen" class="btn bg-mansun-blue text-white">Dosen</button><br><br>

        <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" id="dropdown_mahasiswa">
                <label for="mahasiswa_id">Student_id :</label>
                <select name="mahasiswa_id" class="custom-select" id="dd_mahasiswa">
                    @foreach($mahasiswas as $mahasiswa)
                    <option value="{{$mahasiswa->student_id}}">{{$mahasiswa->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="dropdown_dosen">
                <label for="dosen_id">Dosen_id :</label>
                <select name="dosen_id" class="custom-select" id="dd_dosen">
                    @foreach($dosens as $dosen)
                        <option value="{{$dosen->lecturer_id}}">{{$dosen->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="is_active">is_active :</label>
                <select name="is_active" class="custom-select">
                    <option value="0">Suspended</option>
                    <option value="1">Active</option>
                </select>
            </div>

            <div class="form-group">
                <label for="is_admin">is_admin :</label>
                <select name="is_admin" class="custom-select">
                    <option value="0">Not Admin</option>
                    <option value="1">Admin</option>
                </select>
            </div>

            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection

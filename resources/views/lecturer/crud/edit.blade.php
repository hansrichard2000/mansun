@extends('layouts.lecturer')

@section('judul')
    Edit Dosen
@endsection

@section('judul-top')
    Edit Dosen <p style="color: red">(Admin Mode)</p>
@endsection

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{route('admin.lecturer.update', $lecturer->lecturer_id)}}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="name" placeholder="Input nama dosen" value="{{$lecturer->name}}">
            </div>
            <div class="form-group">
                <label for="nip">NIP : </label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Input nomor induk pengajar" value="{{$lecturer->nip}}">
            </div>
            <div class="form-group">
                <label for="nim">NIDN : </label>
                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Input nomor induk dosen nasional" value="{{$lecturer->nidn}}">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin : </label><br>
                @if($lecturer->gender == "L")
                    <input type="radio" id="L" name="gender" value="L" checked>
                    <label for="L">Laki-laki</label><br>
                    <input type="radio" id="P" name="gender" value="P">
                    <label for="P">Perempuan</label><br>
                @else
                    <input type="radio" id="L" name="gender" value="L">
                    <label for="L">Laki-laki</label><br>
                    <input type="radio" id="P" name="gender" value="P" checked>
                    <label for="P">Perempuan</label><br>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Input email dosen"value="{{$lecturer->email}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone : </label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Input nomor telepon dosen"value="{{$lecturer->phone}}">
            </div>
            <div class="form-group">
                <label for="line_account">Line Account : </label>
                <input type="text" class="form-control" id="line_account" name="line_account" placeholder="Input ID Line dosen"value="{{$lecturer->line_account}}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi : </label>
                <textarea rows="3" class="form-control" id="description" name="description" value="{{$lecturer->description}}"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto : </label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="department">Jurusan : </label><br>
                <select class="form-select" id="department" name="department_id" aria-label="Floating label select example">
                    @foreach($departments as $department)
                        @if($department->department_id == $lecturer->department_id)
                            <option value="{{$department->department_id}}" selected>{{$department->initial}} ({{$department->name}})</option>
                        @else
                            <option value="{{$department->department_id}}">{{$department->initial}} ({{$department->name}})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="department">Gelar : </label><br>
                <select class="form-select" id="department" name="title_id" aria-label="Floating label select example">
                    @foreach($titles as $title)
                        @if($department->department_id == $lecturer->department_id)
                            <option value="{{$department->department_id}}" selected>{{$department->initial}} ({{$department->name}})</option>
                        @else
                            <option value="{{$department->department_id}}">{{$department->initial}} ({{$department->name}})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="department">Jurusan : </label><br>
                <select class="form-select" id="department" name="department_id" aria-label="Floating label select example">
                    @foreach($departments as $department)
                        @if($department->department_id == $lecturer->department_id)
                            <option value="{{$department->department_id}}" selected>{{$department->initial}} ({{$department->name}})</option>
                        @else
                            <option value="{{$department->department_id}}">{{$department->initial}} ({{$department->name}})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <input class="btn bg-mansun-blue text-white" type="submit" id="submit" name="submit" value="Submit">
        </form>
        <br><br>
    </div>
@endsection

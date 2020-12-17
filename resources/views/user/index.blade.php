@extends('layouts.userManagement')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    User Management
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex justify-content-between align-items-center mb-4">

{{--            Search Bar--}}
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                       aria-label="Search">
            </form>

{{--            Add button--}}
            <form method="GET" action="{{route('admin.user.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.user.create')}}">&nbsp;Tambah User</a>
            </form>
        </div>

{{--        TABEL MAHASISWA--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Students</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Batch</th>
                <th scope="col">NIM</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
            <tr>
                <th scope="row">{{$mahasiswa->name}}</th>
                <td>{{$mahasiswa->department_id}}</td>
                <td>{{$mahasiswa->batch}}</td>
                <td>{{$mahasiswa->nim}}</td>

                @if($mahasiswa->is_login == 0)
                    <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                @elseif($mahasiswa->is_login == 1)
                    <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                @endif

                @if($mahasiswa->is_active == 0)
                    <td style="color: red">Suspended</td>
                @elseif($mahasiswa->is_active == 1)
                    <td>Active</td>
                @endif

                <td><button id="button_show_mahasiswa{{$mahasiswa->id}}" style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>

                        $(document).ready(function(){

                            $("#button_show_mahasiswa{{$mahasiswa->id}}").click(function(){

                                document.getElementById("label_1").innerHTML = "Nama Mahasiswa";
                                document.getElementById("info_1").innerHTML = "{{$mahasiswa->name}}";

                                document.getElementById("label_2").innerHTML = "NIM";
                                document.getElementById("info_2").innerHTML = "{{$mahasiswa->nim}}";

                                document.getElementById("label_3").innerHTML = "Gender";
                                document.getElementById("info_3").innerHTML = "{{$mahasiswa->gender}}";

                                document.getElementById("label_4").innerHTML = "Email";
                                document.getElementById("info_4").innerHTML = "{{$mahasiswa->email}}";

                                document.getElementById("label_5").innerHTML = "Phone";
                                document.getElementById("info_5").innerHTML = "{{$mahasiswa->phone}}";

                                document.getElementById("label_6").innerHTML = "Line Account";
                                document.getElementById("info_6").innerHTML = "{{$mahasiswa->line_account}}";

                                document.getElementById("label_7").innerHTML = "Batch";
                                document.getElementById("info_7").innerHTML = "{{$mahasiswa->batch}}";

                                document.getElementById("label_8").innerHTML = "Department ID";
                                document.getElementById("info_8").innerHTML = "{{$mahasiswa->department_id}}";

                                document.getElementById("label_9").innerHTML = "Description";
                                document.getElementById("info_9").innerHTML = "{{$mahasiswa->description}}";

                                document.getElementById("label_10").innerHTML = "Pass photo";
                                document.getElementById("info_10").innerHTML = "{{$mahasiswa->photo}}";

                                $("#info_11").hide();
                                $("#label_11").hide();

                                $("#info_12").hide();
                                $("#label_12").hide();

                            });
                        });

                    </script>

                    @include('user.detail')</td>
            </tr>
                @endforeach
            </tbody>
        </table>

{{--        TABEL DOSEN--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Lecturers</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

            <tr>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">NIP</th>
                <th scope="col">NIDN</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                        <tr>
                            <th scope="row">{{$dosen->name}}</th>
                            <td>{{$dosen->department_id}}</td>
                            <td>{{$dosen->nip}}</td>
                            <td>{{$dosen->nidn}}</td>

                            @if($dosen->is_login == 0)
                                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                            @elseif($dosen->is_login == 1)
                                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                            @endif

                            @if($dosen->is_active == 0)
                                <td style="color: red">Suspended</td>
                            @elseif($dosen->is_active == 1)
                                <td>Active</td>
                            @endif

                            <td><button id="button_show_dosen{{$dosen->id}}" style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                        data-toggle="modal"
                                        data-target="#create"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                <script>

                                    $(document).ready(function(){

                                        $("#button_show_dosen{{$dosen->id}}").click(function(){

                                            document.getElementById("label_1").innerHTML = "Nama Dosen";
                                            document.getElementById("info_1").innerHTML = "{{$dosen->name}}";

                                            document.getElementById("label_2").innerHTML = "NIP";
                                            document.getElementById("info_2").innerHTML = "{{$dosen->nip}}";

                                            document.getElementById("label_3").innerHTML = "NIDN";
                                            document.getElementById("info_3").innerHTML = "{{$dosen->nidn}}";

                                            document.getElementById("label_4").innerHTML = "Gender";
                                            document.getElementById("info_4").innerHTML = "{{$dosen->gender}}";

                                            document.getElementById("label_5").innerHTML = "Email";
                                            document.getElementById("info_5").innerHTML = "{{$dosen->email}}";

                                            document.getElementById("label_6").innerHTML = "Phone";
                                            document.getElementById("info_6").innerHTML = "{{$dosen->phone}}";

                                            document.getElementById("label_7").innerHTML = "Line Account";
                                            document.getElementById("info_7").innerHTML = "{{$dosen->line_account}}";

                                            document.getElementById("label_8").innerHTML = "Department ID";
                                            document.getElementById("info_8").innerHTML = "{{$dosen->department_id}}";

                                            document.getElementById("label_9").innerHTML = "Title ID";
                                            document.getElementById("info_9").innerHTML = "{{$dosen->title_id}}";

                                            document.getElementById("label_10").innerHTML = "Jaka ID";
                                            document.getElementById("info_10").innerHTML = "{{$dosen->jaka_id}}";

                                            $("#label_11").show();
                                            $("#info_11").show();
                                            document.getElementById("label_11").innerHTML = "Description";
                                            document.getElementById("info_11").innerHTML = "{{$dosen->description}}";

                                            $("#label_12").show();
                                            $("#info_12").show();
                                            document.getElementById("label_12").innerHTML = "Pass Photo";
                                            document.getElementById("info_12").innerHTML = "{{$dosen->photo}}";

                                        });
                                    });

                                </script>

                                @include('user.detail')</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

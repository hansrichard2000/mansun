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
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" method="GET" action="{{route('admin.user.search')}}">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                       aria-label="Search" name="keyword">
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
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Batch</th>
                <th scope="col">Login Status</th>
                <th scope="col">Admin Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                    @if(isset($user->student))

                    <tr>

                        <td>{{$user->student['name']}}</td>
                        <td>{{$user->student['email']}}</td>
                        <td>{{$user->student['batch']}}</td>

                        {{--check is_login--}}
                        @if($user->is_login == 1)
                            <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                        @else
                            <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                        @endif

                        {{--check is_admin--}}
                        @if($user->is_admin == 1)
                            <td class="text-success">true</td>
                        @else
                            <td class="text-danger">false</td>
                        @endif

                        {{--check is_active--}}
                        @if($user->is_active == 1)
                            <td class="text-primary">Active</td>
                        @else
                            <td class="text-danger">Suspended</td>
                        @endif

                        <td width="210px">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    {{--detail button--}}
                                    <button id="button_show_mahasiswa{{$user->student_id}}" style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                            data-toggle="modal"
                                            data-target="#detail_user"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                </div>
                                <div class="col-md-4">
                                    {{--Active/Suspend Button--}}
                                    @if($user->is_active == 1)
                                        <form action="{{route('admin.user.suspend')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-danger" style="border-radius: 50%; margin-left: 37%" title="Suspend User" type="submit"><i class="fas fa-door-closed" aria-hidden="true" style="color: #ffffff"></i></button>
                                        </form>
                                    @else
                                        <form action="{{route('admin.user.active')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-success" style="border-radius: 50%; margin-left: 37%" title="Activate User" type="submit"><i class="fas fa-door-open" aria-hidden="true" style="color: #ffffff"></i></button>
                                        </form>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    {{--delete button--}}
                                    <form action="{{ route('admin.user.destroy', $user)}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="type" type="hidden" value="mahasiswa">
                                        <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                    </form>

                                    {{--Javascript untuk overlay detail user--}}
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                    <script>

                                        $(document).ready(function(){

                                            $("#button_show_mahasiswa{{$user->student_id}}").click(function(){

                                                document.getElementById("label_1").innerHTML = "Nama Mahasiswa";
                                                document.getElementById("info_1").innerHTML = "{{$user->student['name']}}";

                                                document.getElementById("label_2").innerHTML = "NIM";
                                                document.getElementById("info_2").innerHTML = "{{$user->student['nim']}}";

                                                document.getElementById("label_3").innerHTML = "Gender";
                                                document.getElementById("info_3").innerHTML = "{{$user->student['gender']}}";

                                                document.getElementById("label_4").innerHTML = "Email";
                                                document.getElementById("info_4").innerHTML = "{{$user->email}}";

                                                document.getElementById("label_5").innerHTML = "Phone";
                                                document.getElementById("info_5").innerHTML = "{{$user->student['phone']}}";

                                                document.getElementById("label_6").innerHTML = "Line Account";
                                                document.getElementById("info_6").innerHTML = "{{$user->student['line_account']}}";

                                                document.getElementById("label_7").innerHTML = "Batch";
                                                document.getElementById("info_7").innerHTML = "{{$user->student['batch']}}";

                                                document.getElementById("label_8").innerHTML = "Department";
                                                document.getElementById("info_8").innerHTML = "{{$user->student->department['name']}}";

                                                document.getElementById("label_9").innerHTML = "Description";
                                                document.getElementById("info_9").innerHTML = "{{$user->student['description']}}";

                                                document.getElementById("label_10").innerHTML = "Pass photo";
                                                document.getElementById("info_10").innerHTML = "{{$user->student['photo']}}";

                                                $("#info_11").hide();
                                                $("#label_11").hide();

                                                $("#info_12").hide();
                                                $("#label_12").hide();

                                            });
                                        });

                                    </script>

                                    @include('user.detail')
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
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
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">NIP</th>
                <th scope="col">NIDN</th>
                <th scope="col">Login Status</th>
                <th scope="col">Active Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                    @if(isset($user->lecturer))

                        <tr>
                            <td>{{$user->lecturer['name']}}</td>
                            <td>{{$user->lecturer['email']}}</td>
                            <td>{{$user->lecturer->department['name']}}</td>
                            <td>{{$user->lecturer['nip']}}</td>
                            <td>{{$user->lecturer['nidn']}}</td>

                            @if($user->is_login == 1)
                                <td><div style="width:20px;height: 20px;background-color: #1789fc; margin-left: 41%"></div></td>
                            @else
                                <td><div style="width:20px;height: 20px;background-color: grey; margin-left: 41%"></div></td>
                            @endif

                            @if($user->is_active == 1)
                                <td class="text-primary">Active</td>
                            @else
                                <td class="text-danger">Suspended</td>
                            @endif

                            <td>
                                <div class="row no-gutters">

                                    {{--Detail Button--}}
                                    <div class="col-md-4">
                                        <button id="button_show_dosen{{$user->lecturer_id}}" style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                                data-toggle="modal"
                                                data-target="#detail_user"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                    </div>

                                    {{--Active/Suspend Button--}}
                                    <div class="col-md-4">
                                        @if($user->is_active == 1)
                                            <form action="{{route('admin.user.suspend')}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <button class="btn btn-danger" style="border-radius: 50%; margin-left: 37%" title="Suspend User" type="submit"><i class="fas fa-door-closed" aria-hidden="true" style="color: #ffffff"></i></button>
                                            </form>
                                        @else
                                            <form action="{{route('admin.user.active')}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <button class="btn btn-success" style="border-radius: 50%; margin-left: 37%" title="Activate User" type="submit"><i class="fas fa-door-open" aria-hidden="true" style="color: #ffffff"></i></button>
                                            </form>
                                        @endif
                                    </div>

                                    {{--Delete User Button--}}
                                    <div class="col-md-4">
                                        <form action="{{ route('admin.user.destroy', $user)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="type" type="hidden" value="dosen">
                                            <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                        </form>

                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                        <script>

                                            $(document).ready(function(){

                                                $("#button_show_dosen{{$user->lecturer_id}}").click(function(){

                                                    document.getElementById("label_1").innerHTML = "Nama Dosen";
                                                    document.getElementById("info_1").innerHTML = "{{$user->lecturer['name']}}";

                                                    document.getElementById("label_2").innerHTML = "NIP";
                                                    document.getElementById("info_2").innerHTML = "{{$user->lecturer['nip']}}";

                                                    document.getElementById("label_3").innerHTML = "NIDN";
                                                    document.getElementById("info_3").innerHTML = "{{$user->lecturer['nidn']}}";

                                                    document.getElementById("label_4").innerHTML = "Gender";
                                                    document.getElementById("info_4").innerHTML = "{{$user->lecturer['gender']}}";

                                                    document.getElementById("label_5").innerHTML = "Email";
                                                    document.getElementById("info_5").innerHTML = "{{$user->email}}";

                                                    document.getElementById("label_6").innerHTML = "Phone";
                                                    document.getElementById("info_6").innerHTML = "{{$user->lecturer['phone']}}";

                                                    document.getElementById("label_7").innerHTML = "Line Account";
                                                    document.getElementById("info_7").innerHTML = "{{$user->lecturer['line_account']}}";

                                                    document.getElementById("label_8").innerHTML = "Department";
                                                    document.getElementById("info_8").innerHTML = "{{$user->lecturer->department['name']}}";

                                                    document.getElementById("label_9").innerHTML = "Title";
                                                    document.getElementById("info_9").innerHTML = "{{$user->lecturer->title['name']}}";

                                                    document.getElementById("label_10").innerHTML = "Jaka";
                                                    document.getElementById("info_10").innerHTML = "{{$user->lecturer->jaka['name']}}";

                                                    $("#label_11").show();
                                                    $("#info_11").show();
                                                    document.getElementById("label_11").innerHTML = "Description";
                                                    document.getElementById("info_11").innerHTML = "{{$user->lecturer['description']}}";

                                                    $("#label_12").show();
                                                    $("#info_12").show();
                                                    document.getElementById("label_12").innerHTML = "Pass Photo";
                                                    document.getElementById("info_12").innerHTML = "{{$user->lecturer['photo']}}";

                                                });
                                            });

                                        </script>

                                        @include('user.detail')
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif

                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

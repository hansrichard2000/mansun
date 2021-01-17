@extends('layouts.student')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    Student List <p style="color:red;">(Admin Mode)</p>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex justify-content-between align-items-center mb-4">

            {{--            Search Bar--}}
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" method="GET" action="{{route('admin.student.search')}}">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                       aria-label="Search" name="keyword">
            </form>

            {{--            Add button--}}
            <form method="GET" action="{{route('admin.student.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.student.create')}}">&nbsp;Tambah Mahasiswa</a>
            </form>
        </div>

        {{--        TABEL MAHASISWA--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Students</h3>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">NIM</th>
                <th scope="col">Batch</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)

                <tr>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->nim}}</td>
                    <td>{{$student->batch}}</td>
                    <td>{{$student->department['initial']}}</td>

                    <td>
                        <div class="row no-gutters">

                            {{--                                Detail Button--}}
                            <div class="col-md-4 ml-3">
                                <button id="button_student_detail" style="border-radius: 50%; margin-left: 58%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Show student detail"
                                        data-toggle="modal"
                                        data-target="#detail_student{{$student->student_id}}"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                            </div>

                        @include('student.detail')
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

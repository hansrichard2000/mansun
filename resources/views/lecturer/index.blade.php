@extends('layouts.lecturer')

@section('judul')
    Admin Area
@endsection

@section('judul-top')
    Lecturer List <p style="color:red;">(Admin Mode)</p>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex justify-content-between align-items-center mb-4">

            {{--            Search Bar--}}
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" method="GET" action="{{route('admin.lecturer.search')}}">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                       aria-label="Search" name="keyword">
            </form>

            {{--            Add button--}}
            <form method="GET" action="{{route('admin.lecturer.create')}}">
                <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="{{route('admin.lecturer.create')}}">&nbsp;Tambah Dosen</a>
            </form>
        </div>

        {{--        TABEL DOSEN--}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Tabel Lecturers</h3>
            <b>Total lecturers : {{count($lecturers)}}</b>
        </div>
        <table class="table table-hover" style="text-align: center">
            <thead class="thead-dark">

            <tr>
                <th scope="col">Lecturer ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">NIP / NIDN</th>
                <th scope="col">Department</th>
                <th scope="col">Title</th>
                <th scope="col">Jaka</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lecturers as $lecturer)

                    <tr>
                        <td>{{$lecturer->lecturer_id}}</td>
                        <td>{{$lecturer->name}}</td>
                        <td>{{$lecturer->gender}}</td>
                        <td>{{$lecturer->nip}} / {{$lecturer->nidn}}</td>
                        <td>{{$lecturer->department['name']}}</td>
                        <td>{{$lecturer->title['name']}}</td>
                        <td>{{$lecturer->jaka['name']}}</td>

                        <td>
                            <div class="row no-gutters">

{{--                                Detail Button--}}
                                <div class="col-md-4 ml-3">
                                    <button id="button_lecturer_detail" style="border-radius: 50%; margin-left: 58%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Show lecturer detail"
                                            data-toggle="modal"
                                            data-target="#detail_lecturer{{$lecturer->lecturer_id}}"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                </div>

{{--                                --}}{{--Delete User Button--}}
{{--                                <div class="col-md-4 pl-4">--}}
{{--                                    <form action="{{ route('admin.lecturer.destroy', $user)}}" method="POST">--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        <input name="_method" type="hidden" value="DELETE">--}}
{{--                                        <input name="type" type="hidden" value="dosen">--}}
{{--                                        <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>--}}
{{--                                    </form>--}}

                                    @include('lecturer.detail')
                                </div>
                        </td>
                    </tr>

            @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection

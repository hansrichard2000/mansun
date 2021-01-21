@extends('layouts.beranda')

@section('judul')
    List Anggota
@endsection

@section('judul-top')
    Lihat Daftar Anggota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0 ml-3">{{$member->nama_divisi}}</h3>
            @auth
{{--                {{dd($members)}}--}}
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#createAnggota">Tambah Anggota</button>
                    @include('divisi.crud.tambahAnggota')
                @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                    @foreach($anggotas as $anggota)
                        @if($anggota->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                            @if($anggota->role['id'] == 1 || $anggota->role['id'] == 2)
                            <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                    data-toggle="modal"
                                    data-target="#createAnggotaFromHOD">Tambah Anggota</button>
                            @include('divisi.crud.tambahAnggotaFromHOD')
                        @endif
                        @endif
                    @endforeach
                @endif
            @endauth
        </div>
        <hr class="garisKuning">
        <div class="row m-1">
            <table class="table table-striped">
                <thead class="bg-mansun-blue text-white">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">email</th>
                    <th scope="col">Role</th>
                    @auth
                        @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                            <th scope="col">Action</th>
                        @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                            @foreach($anggotas as $anggota)
                                @if($anggota->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                                    @if($anggota->role['id'] == 1)
                                        @if(strtolower($member->nama_divisi) != "hod")
                                        <th scope="col">Action</th>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endauth
                </tr>
                </thead>
                <tbody>

                    @if(\illuminate\Support\Facades\Auth::user()->isAdmin())

                        @foreach($members as $member)

                            <tr class="text-center">
                                <td>{{$member->user->id}}</td>
                                <td>{{$member->user->student['name']}}</td>
                                <td>{{$member->user->email}}</td>
                                <td>{{$member->role->role}}</td>

                                <td>
                                    <form action="{{route('admin.role.destroy', $member->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                        @foreach($anggotas as $anggota)
                            @if($anggota->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                                @if($anggota->role['id'] == 1)

                                    @foreach($members as $member_temp)

                                        <tr class="text-center">
                                            <td>{{$member_temp->user->id}}</td>
                                            <td>{{$member_temp->user->student['name']}}</td>
                                            <td>{{$member_temp->user->email}}</td>
                                            <td>{{$member_temp->role->role}}</td>
                                            @if(strtolower($member->nama_divisi) != "hod")
                                            <td>
                                                <form action="{{route('user.role.destroy', $member_temp->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                                </form>
                                            </td>
                                            @endif

                                        </tr>
                                    @endforeach

                                    @elseif($anggota->role['id'] != 1)

                                    @foreach($members as $member)

                                        <tr class="text-center">
                                            <td>{{$member->user->id}}</td>
                                            <td>{{$member->user->student['name']}}</td>
                                            <td>{{$member->user->email}}</td>
                                            <td>{{$member->role->role}}</td>
                                        </tr>
                                    @endforeach

                                @endif
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

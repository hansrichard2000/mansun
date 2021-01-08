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
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                            data-toggle="modal"
                            data-target="#createAnggota">Tambah Anggota</button>
                    @include('divisi.crud.tambahAnggota')
                @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                    @foreach($members as $member)
                        @if($id == $member->divisi['id'] && $member->role['id'] == 1 && $member->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                            <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                                    data-toggle="modal"
                                    data-target="#createAnggotaFromHOD">Tambah Anggota</button>
                            @include('divisi.crud.tambahAnggotaFromHOD')
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
                            @foreach($members as $member)
                                @if($id == $member->divisi['id'] && $member->role['id']  == 1 && $member->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                                    <th scope="col">Action</th>
                                @endif
                            @endforeach
                        @endif
                    @endauth
                </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
{{--                        {{dd($member->user)}}--}}
                        <tr class="text-center">
                            <td>{{$member->user->id}}</td>
                            <td>{{$member->user->student['name']}}</td>
                            <td>{{$member->user->email}}</td>
                            <td>{{$member->role->role}}</td>
                            @auth
                                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <td>
                                        <form action="{{route('admin.role.destroy', $member->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                        </form>
                                    </td>
                                @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
{{--                                    @foreach(\illuminate\Support\Facades\Auth::user()->roles as $userRoles)--}}
                                        @if($id == $member->divisi['id'] && $member->role['id']  == 1 && $member->user['id'] == \Illuminate\Support\Facades\Auth::user()->id)
                                            <td>
                                                <form action="{{route('user.role.destroy', $member->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger text-white" title="Delete this user" style="border-radius: 50%"><i class="fas fa-trash" aria-hidden="true" style="color: #ffffff"></i></button>
                                                </form>
                                            </td>
                                        @endif
{{--                                    @endforeach--}}
                                @endif
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

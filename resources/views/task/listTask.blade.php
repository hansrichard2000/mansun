@extends('layouts.listTask')

@section('judul')
    Daftar Tugas
@endsection

@section('judul-top')
    Daftar Tugas
@endsection

@section('content')
    <div class="container-fluid">
        <table class="table table-striped text-center">
            <thead class="bg-mansun-blue text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tugas</th>
                <th scope="col">PIC</th>
                <th scope="col">Deadline</th>
                <th scope="col">Link</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tbody>
            @foreach($tasks as $task)

                    {{--                                {{dd($task)}}--}}
                    <tr>
                        <td scope="col">{{$task->id}}</td>
                        <td scope="col">{{$task->judul}}</td>
                        <td scope="col">{{$task->receiver->student['name']}}</td>
                        <td scope="col">{{$task->deadline}}</td>
                        @if($task->link_hasil_kerja == null)
                            <td scope="col">-</td>
                        @else
                            <td scope="col"><a href="{{$task->link_hasil_kerja}}">{{$task->link_hasil_kerja}}</a></td>
                        @endif
                        @if($task->status_task_id == 1)
                            <td scope="col" class="text-dark">{{$task->status_task->statustask}}</td>
                        @elseif($task->status_task_id == 2)
                            <td scope="col" class="text-primary">{{$task->status_task->statustask}}</td>
                        @elseif($task->status_task_id == 3)
                            <td scope="col" class="text-success">{{$task->status_task->statustask}}</td>
                        @elseif($task->status_task_id == 4)
                            <td scope="col" class="text-danger">{{$task->status_task->statustask}}</td>
                        @endif
                    <td>
                        @auth
                            @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                           <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="See Task Detail"
                                                    data-toggle="modal"
                                                    data-target="#detail_task{{$task->id}}"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                            @include('task.detail')
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{route('user.task.approve')}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$task->id}}">
                                                <button class="btn btn-success" style="border-radius: 50%; margin-left: 37%" title="Approve Task" type="submit"><i class="fas fa-check" aria-hidden="true" style="color: #ffffff"></i></button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="{{route('user.task.reject')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$task->id}}">
                                    <button class="btn btn-danger" style="border-radius: 50%; margin-left: 37%" title="Reject Task" type="submit"><i class="fas fa-times" aria-hidden="true" style="color: #ffffff"></i></button>
                                </form>
                            </div>
                        </div>
                        @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                                @foreach($users as $user)
{{--                                    {{dd($user->mansun_user_id)}}--}}
                                    @if($task->divisi['id'] == $user->divisi['id'] && ($user->role['id'] == 1 || $user->role['id'] == 2))
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="See Task Detail"
                                                        data-toggle="modal"
                                                        data-target="#detail_task{{$task->id}}"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                                @include('task.detail')
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{route('user.task.approve')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$task->id}}">
                                                    <button class="btn btn-success" style="border-radius: 50%; margin-left: 37%" title="Approve Task" type="submit"><i class="fas fa-check" aria-hidden="true" style="color: #ffffff"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{route('user.task.reject')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$task->id}}">
                                                    <button class="btn btn-danger" style="border-radius: 50%; margin-left: 37%" title="Reject Task" type="submit"><i class="fas fa-times" aria-hidden="true" style="color: #ffffff"></i></button>
                                                </form>
                                            </div>
                                        </div>


                                        @elseif($task->divisi['id'] == $user->divisi['id'] && ($user->role['id'] == 3))
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <button style="border-radius: 50%; margin-left: 37%" type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="See Task Detail"
                                                        data-toggle="modal"
                                                        data-target="#detail_task{{$task->id}}"><i class="fas fa-search" aria-hidden="true" style="color: #ffffff"></i></button>
                                                @include('task.detail')
                                            </div>
                                            @if($task->link_hasil_kerja == null)
                                                <div class="col-md-4">
                                                    <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="See Task Detail"
                                                            data-toggle="modal"
                                                            data-target="#submit_task{{$task->id}}">Input</button>
                                                </div>
                                                @include('task.user.submit')
                                            @else
                                                <div class="col-md-4">
                                                    <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="See Task Detail"
                                                            data-toggle="modal"
                                                            data-target="#submit_task{{$task->id}}">Update</button>
                                                </div>
                                                @include('task.user.submit')
                                    @endif
                                    @endif
                                @endforeach
                            @endif

                        @endauth
                    </td>

                    </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection

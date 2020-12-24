@extends('layouts.beranda')

@section('judul')
    Daftar Divisi
@endsection

@section('judul-top')
    {{$prokers->nama_proker}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h4 class="text-dark mb-0">Deskripsi</h4>
            <form action="{{route('admin.proker.edit', $prokers)}}" method="GET">
                @csrf
                <input type="submit" id="submit" name="submit" value="Edit Proker" class="btn bg-mansun-blue text-white float-left mr-5">
            </form>
        </div>
        <hr class="garisKuning">
        <div class="d-sm-flex justify-content-between mb-4 card">
            <div class="card-body">
                <p>{{$prokers->deskripsi_proker}}</p>
                <ol>
                    <li>Pelaksanaan : {{$prokers->tanggal_mulai}} - {{$prokers->tanggal_akhir}}</li>
                    <li>Penganggaran :
                        <ul type="square">
                            <li>Pemasukkan : {{$prokers->pemasukan}}</li>
                            <li>Pengeluaran : {{$prokers->pengeluaran}}</li>
                            <li>Rekapitulasi : {{$prokers->pemasukan - $prokers->pengeluaran}}</li>
                        </ul>
                    </li>
                    <li>
                        Media Sosial : <a href="{{$prokers->medsos}}">{{$prokers->medsos}}</a>
                    </li>
                    <li>
                        Link Proposal : <a href="{{$prokers->proposal}}">{{$prokers->proposal}}</a>
                    </li>
                    <li>
                        Link LPJ : <a href="{{$prokers->lpj}}">{{$prokers->lpj}}</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h4 class="text-dark mb-0">Daftar Divisi</h4>
            <div class="card">
                <div class="card-body">
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#68CC2A"/>
                    </svg>
                    <p class="float-left">Approved &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#FF2828"/>
                    </svg>
                    <p class="float-left">Rejected &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#FFB800"/>
                    </svg>
                    <p class="float-left">Submitted &emsp;</p>
                    <svg class="float-left" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" fill="#B5B5B5"/>
                    </svg>
                    <p class="float-left">Not Submitted &emsp;</p>
                </div>
            </div>
            <button type="button" class="btn bg-mansun-blue text-white float-left mr-5" title="Add guest to this event"
                    data-toggle="modal"
                    data-target="#create">Tambah Divisi</button>
            @include('divisi.crud.create')
        </div>
        <hr class="garisKuning">
        @foreach($divisis as $divisi)
        <div class="row m-1">
            <div class="card mt-3 w-100">
                <div class="card-header">
                    <div class="float-md-left">
                        {{$divisi->nama_divisi}}
                    </div>
                    <div class="float-md-right mr-3">
                        <form action="{{route('admin.divisi.show', $divisi->id)}}" method="GET">
                            @csrf
                            <input type="submit" class="btn bg-mansun-blue text-white" value="Lihat anggota">
                        </form>
                    </div>
                    <div class="float-md-right mr-3">
                        <form action="{{route('admin.task.create')}}" method="GET">
                            @csrf
                            <input type="submit" class="btn bg-mansun-blue text-white" value="Tambah Tugas">
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-mansun-blue text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tugas</th>
                            <th scope="col">PIC</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col">Link</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                @if($task->divisi_id == $divisi->id)
{{--                                {{dd($task)}}--}}
                                <tr>
                                    <td scope="col">{{$task->id}}</td>
                                    <td scope="col">{{$task->judul}}</td>
                                    <td scope="col">{{$task->receiver->id}}</td>
                                    <td scope="col">{{$task->deadline}}</td>
                                    <td scope="col">{{$task->status_task->id}}</td>
                                    <td scope="col">{{$task->link_hasil_kerja}}</td>
                                    <td scope="col">
                                        <button class="btn btn-success">
                                            Approve
                                        </button>
                                        <button class="btn btn-danger">
                                            Reject
                                        </button>
                                        <button class="btn btn-primary">
                                            More
                                        </button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        <br><br>
    </div>
@endsection

<!-- The Modal -->
<div class="modal fade" id="detail_task{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="info_title" class="modal-title">Detail Task </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="form-group">

                    <b><label id="label_1" for="judul">Judul</label></b>
                    <p id="judul">{{$task->judul}}</p>

                    <b><label id="label_1" for="deskripsi">Deskripsi</label></b>
                    <p id="deskripsi">{{$task->deskripsi}}</p>

                    <b><label id="label_1" for="deadline">Deadline</label></b>
                    <p id="deadline">{{$task->deadline}}</p>

                    <b><label id="label_1" for="link_hasil_kerja">Link Hasil Kerja</label></b>
                    @if($task->link_hasil_kerja == null)
                        <p id="link_hasil_kerja"> - </p>
                    @else
                        <p id="link_hasil_kerja">{{$task->link_hasil_kerja}}</p>
                    @endif

                    <b><label id="label_1" for="penangungjawab">Penangung Jawab</label></b>
                    <p id="penangungjawab">{{$task->receiver->student['name']}}</p>

                    <b><label id="label_1" for="divisi">Divisi</label></b>
                    <p id="divisi">{{$task->divisi['nama_divisi']}}</p>

                    <b><label id="label_1" for="status_task">Status Task</label></b>
                    <p id="status_task">{{$task->status_task['statustask']}}</p>

                </div>
            </div>
            @auth
                @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <form method="GET" action="{{route('admin.task.edit', $task->id)}}">
                                <input class="btn bg-mansun-blue text-white" type="submit" name="submit" value="Edit">
                            </form>
                            <form method="POST" action="{{route('admin.task.destroy', $task->id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger text-white" type="submit" name="submit" value="Delete">
                            </form>
                        </div>
                    @elseif(\illuminate\Support\Facades\Auth::user()->isUser())
                        @foreach(\illuminate\Support\Facades\Auth::user()->roles as $userRoles)
                            @if($userRoles->id == 1 || $userRoles->id == 2)
                                <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <form method="GET" action="{{route('user.task.edit', $task->id)}}">
                                            <input class="btn bg-mansun-blue text-white" type="submit" name="submit" value="Edit">
                                        </form>
                                        <form method="POST" action="{{route('user.task.destroy', $task->id)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input class="btn btn-danger text-white" type="submit" name="submit" value="Delete">
                                        </form>
                                    </div>
                            @endif
                        @endforeach
                @endif
            @endauth
        </div>
    </div>
</div>

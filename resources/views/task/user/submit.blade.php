<!-- The Modal -->
<div class="modal fade" id="submit_task{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Submit Link {{$task->judul}} </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route('user.task.update', $task)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="nama_divisi">Link : </label>
                        <input type="text" class="form-control" value="{{$task->link_hasil_kerja}}" id="link_hasil_kerja" name="link_hasil_kerja">
                    </div>
                    <input type="hidden" name="divisi_id" value="{{$task->divisi_id}}">
                    <div class="form-group">
                        <button class="btn bg-mansun-blue text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="createFromHOD">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah divisi {{$prokers->nama_proker}} </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route('user.divisi.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_divisi">Nama Divisi :</label>
                        <input type="text" class="form-control" id="nama_divisi" name="nama_divisi">
                    </div>
                    <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    <input name="proker_id" type="hidden" value="{{$id}}">
                    <div class="form-group">
                        <button class="btn bg-mansun-blue text-white" type="submit">Tambah Divisi</button>
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

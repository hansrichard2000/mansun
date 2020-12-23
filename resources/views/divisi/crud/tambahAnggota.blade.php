<!-- The Modal -->
<div class="modal fade" id="createAnggota">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah anggota divisi {{$members->nama_divisi}} </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route('admin.role.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="mansun_user_id">Select User</label>
                        <select name="mansun_user_id" class="custom-select" required>
                            @foreach($userList as $user)
                                <option value="{{$user->id}}" title="{{$user->student['name']}}">{{$user->student['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mansun_role_id">Select Role</label>
                        <select name="mansun_role_id" class="custom-select" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" title="{{$role->role}}">{{$role->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input name="mansun_divisi_id" type="hidden" value="{{$members->id}}">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Tambah Anggota</button>
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

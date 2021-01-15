<!-- The Modal -->
<div class="modal fade" id="detail_lecturer{{$lecturer->lecturer_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="info_title" class="modal-title">Detail Dosen </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="form-group">

                    <b><label id="label_id" for="id">Lecturer ID</label></b>
                    <p id="id">{{$lecturer->lecturer_id}}</p>

                    <b><label id="label_name" for="name">Name</label></b>
                    <p id="name">{{$lecturer->name}}</p>

                    <b><label id="label_gender" for="gender">Gender</label></b>
                    <p id="gender">{{$lecturer->gender}}</p>

                    <b><label id="label_nip" for="nip">NIP</label></b>
                    <p id="nip">{{$lecturer->nip}}</p>

                    <b><label id="label_nidn" for="nidn">NIDN</label></b>
                    <p id="nidn">{{$lecturer->nidn}}</p>

                    <b><label id="label_email" for="email">Email</label></b>
                    <p id="email">{{$lecturer->email}}</p>

                    <b><label id="label_phone" for="phone">Phone</label></b>
                    <p id="phone">{{$lecturer->phone}}</p>

                    <b><label id="label_line_account" for="line_account">Line Account</label></b>
                    <p id="line_account">{{$lecturer->line_account}}</p>

                    <b><label id="label_description" for="description">Description</label></b>
                    <p id="description">{{$lecturer->description}}</p>

                    <b><label id="label_photo" for="photo">Photo</label></b>
                    <p id="photo">{{$lecturer->photo}}</p>

                    <b><label id="label_department" for="department">Department</label></b>
                    <p id="department">{{$lecturer->department['name']}}</p>

                    <b><label id="label_title" for="title">Title</label></b>
                    <p id="title">{{$lecturer->title['name']}}</p>

                    <b><label id="label_jaka" for="jaka">Jaka</label></b>
                    <p id="jaka">{{$lecturer->jaka['name']}}</p>

                </div>
            </div>
                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <form method="GET" action="{{route('admin.lecturer.edit', $lecturer->lecturer_id)}}">
                                <input class="btn bg-mansun-blue text-white" type="submit" name="submit" value="Edit">
                            </form>
                            <form method="POST" action="{{route('admin.lecturer.destroy', $lecturer->lecturer_id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger text-white" type="submit" name="submit" value="Delete">
                            </form>
                        </div>
        </div>
    </div>
</div>

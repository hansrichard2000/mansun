<!-- The Modal -->
<div class="modal fade" id="detail_student{{$student->student_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="info_title" class="modal-title">Detail Mahasiswa </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="form-group">

                    <b><label id="label_id" for="id">Student ID</label></b>
                    <p id="id">{{$student->student_id}}</p>

                    <b><label id="label_name" for="name">Name</label></b>
                    <p id="name">{{$student->name}}</p>

                    <b><label id="label_nim" for="nim">NIM</label></b>
                    <p id="nim">{{$student->nim}}</p>

                    <b><label id="label_email" for="email">Email</label></b>
                    <p id="email">{{$student->email}}</p>

                    <b><label id="label_phone" for="phone">Phone</label></b>
                    <p id="phone">{{$student->phone}}</p>

                    <b><label id="label_line_account" for="line_account">Line Account</label></b>
                    <p id="line_account">{{$student->line_account}}</p>

                    <b><label id="label_description" for="description">Description</label></b>
                    <p id="description">{{$student->description}}</p>

                    <b><label id="label_photo" for="photo">Photo</label></b>
                    <p id="photo">{{$student->photo}}</p>

                    <b><label id="label_department" for="department">Department</label></b>
                    <p id="department">{{$student->department['name']}}</p>

                </div>
            </div>
                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <form method="GET" action="{{route('admin.student.edit', $student->student_id)}}">
                                <input class="btn bg-mansun-blue text-white" type="submit" name="submit" value="Edit">
                            </form>
                            @if(\Illuminate\Support\Facades\Auth::user()->student_id == $student->student_id)
                            <form method="POST" action="{{route('admin.student.destroy', $student->student_id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger text-white" type="submit" name="submit" value="Delete" style="opacity: 25%;" disabled>
                            </form>
                            @else
                                <form method="POST" action="{{route('admin.student.destroy', $student->student_id)}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input class="btn btn-danger text-white" type="submit" name="submit" value="Delete">
                                </form>
                            @endif
                        </div>
        </div>
    </div>
</div>

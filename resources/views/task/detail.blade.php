<!-- The Modal -->
<div class="modal fade" id="detail_task">
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

                    <b><label id="label_1" for="nama_task">Label 1</label></b>
                    <p id="info_1">Info 1</p>

                    <b><label id="label_2"  for="nama_task">Label 2</label></b>
                    <p id="info_2">Info 2</p>

                    <b><label id="label_3"  for="nama_task">Label 3</label></b>
                    <p id="info_3">Info 3</p>

                    <b><label id="label_4"  for="nama_task">Label 4</label></b>
                    <p id="info_4">Info 4</p>

                    <b><label id="label_5"  for="nama_task">Label 5</label></b>
                    <p id="info_5">Info 5</p>

                    <b><label id="label_6"  for="nama_task">Label 6</label></b>
                    <p id="info_6">Info 6</p>

                    <b><label id="label_7"  for="nama_task">Label 7</label></b>
                    <p id="info_7">Info 7</p>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <form method="GET" action="{{route('admin.user.create', )}}">
                    <input class="btn bg-mansun-blue text-white" type="submit" name="submit" value="Edit">
                </form>
                {{--                <a href="{{route('admin.user.destroy')}}" class="btn btn-danger">Delete</a>--}}
            </div>
        </div>
    </div>
</div>


<form action="/create-time-table" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="timetables" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Time Table</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" name="class_name" id="" list="classrooms" class="form-control">
                        <datalist id="classrooms">
                        @foreach ($class_rooms as $item)
                            <option value="{{ $item->class_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <input type="file" name="time_table" class="form-control" accept="application/pdf">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
            </div>
        </div>
    </div>
</form>
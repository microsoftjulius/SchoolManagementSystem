@if(request()->route()->getName() == "Time Tables")
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
@endif

@if(request()->route()->getName() == "Subjects")
<form action="/create-subject" method="post">
    @csrf
    <div class="modal fade" id="subjects" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Time Table</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="SubjectName">Subject Name</label>
                        <input type="text" name="subject_name" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <label for="SubjectCode">Subject Code</label>
                        <input type="text" name="subject_code" class="form-control" autocomplete="off"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Teachers</label>
                        <input type="text" name="teacher_name" id="" list="teachers" class="form-control" autocomplete="off">
                        <datalist id="teachers">
                        @foreach ($teachers as $item)
                            <option value="{{ $item->efirst_name }} {{ $item->elast_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

@if(request()->route()->getName() == "Home Works")
<form action="/create-home-work" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="homework" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add A New Home Work</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="SubjectName">Choose Homework</label>
                        <input type="file" name="paper_path" class="form-control" autocomplete="off" accept="application/pdf">
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Subject</label>
                        <input type="text" name="subject_name" id="" list="subjects" class="form-control" autocomplete="off">
                        <datalist id="subjects">
                        @foreach ($subjects as $item)
                            <option value="{{ $item->subject_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Class</label>
                        <input type="text" name="class_name" id="" list="classrooms" class="form-control" autocomplete="off">
                        <datalist id="classrooms">
                        @foreach ($class_rooms as $item)
                            <option value="{{ $item->class_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

@if(request()->route()->getName() == "Examination Marks")
<form action="/create-exam-marks" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exammarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add A New Home Work</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="Teachers">Student</label>
                        <input type="text" name="student_name" id="" list="students" class="form-control" autocomplete="off">
                        <datalist id="students">
                        @foreach ($students as $item)
                            <option value="{{ $item->sfirst_name }} {{ $item->slast_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Class</label>
                        <input type="text" name="class_name" id="" list="classrooms" class="form-control" autocomplete="off">
                        <datalist id="classrooms">
                        @foreach ($class_rooms as $item)
                            <option value="{{ $item->class_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>

                    <div class="col-lg-6">
                        <label for="Teachers">Subject</label>
                        <input type="text" name="subject_name" id="" list="subjects" class="form-control" autocomplete="off">
                        <datalist id="subjects">
                        @foreach ($subjects as $item)
                            <option value="{{ $item->subject_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <label for="SubjectName">Marks</label>
                        <input type="number" name="marks" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-lg-12">
                        <label for="SubjectName">Comment</label>
                        <input type="text" name="comment" class="form-control" autocomplete="off">
                    </div>
                    
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

@if(request()->route()->getName() == "Fees")
<form action="/make-fees-payment" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="fees" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Payment</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="SubjectName">Student</label>
                        <input type="text" name="student_name" class="form-control" list="students" autocomplete="off">
                        <datalist id="students">
                        @foreach ($students as $item)
                            <option value="{{ $item->sfirst_name }} {{ $item->slast_name }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Amount</label>
                        <input type="number" name="amount" id="" list="subjects" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <label for="Teachers">Term</label>
                        <input type="text" name="term" id="" list="terms" class="form-control" autocomplete="off">
                        <datalist id="terms">
                        @foreach ($terms as $item)
                            <option value="{{ $item->term }}"></option>
                        @endforeach
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

@if(request()->route()->getName() == "Activity")
<form action="/create-co-curricular-activity" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Activity</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="ActivityName">Activity</label>
                        <input type="text" name="activity" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <label for="ActivityName">Date</label>
                        <input type="date" name="date" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

@if(request()->route()->getName() == "Public Days")
<form action="/create-public-day" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="publicday" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Public Day</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="ActivityName">Public Day</label>
                        <input type="text" name="public_day" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <label for="ActivityName">Date</label>
                        <input type="date" name="date" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="created_by" class="form-control" value="1">
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
@endif

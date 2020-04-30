@include('admin_layouts.message')
@if(request()->route()->getName() == "Time Tables")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Class Name</th>
                        <th>Time Table</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Class Name</th>
                        <th>Time Table</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->classroom->class_name }}</td>
                        <td>{{ $item->time_table }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="/delete-time-table/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timetables">Add New Time Table</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Subjects")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Teacher</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Teacher</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->subject_code }}</td>
                        <td>{{ $item->teachers->efirst_name }} {{ $item->teachers->elast_name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="/delete-subject/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subjects">Add Subject</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Activity")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Activity Name</th>
                        <th>Taking Place At</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Activity Name</th>
                        <th>Taking Place At</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td style="text-transform:capitalize">{{ $item->activity }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-activity/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#activity">Add New Activity</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Messages")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Message</th>
                        <th>Date Of Sending</th>
                        <th>Message Sent To</th>
                        <th>Message Sent By</th>
                        <th>Message Status</th>
                        <th>Date Of Creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Message</th>
                        <th>Date Of Sending</th>
                        <th>Message Sent To</th>
                        <th>Message Sent By</th>
                        <th>Message Status</th>
                        <th>Date Of Creation</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->date_of_sending }}</td>
                        <td>{{ $item->personalGroup->group_name }}</td>
                        <td>{{ $item->user->name }}</td>
                        @if($item->status == 'pending')
                        <td><div class="badge badge-warning badge-pill">{{ $item->status }}</div></td>
                        @elseif($item->status == 'sent')
                        <td><div class="badge badge-success badge-pill">{{ $item->status }}</div></td>
                        @elseif($item->status == 'scheduled')
                        <td><div class="badge badge-info badge-pill">{{ $item->status }}</div></td>
                        @endif
                        <td>{{ $item->created_at }}</td>                        
                        <td>
                            <button class="btn btn-datatable btn-icon btn-primary"><i class="fa fa-edit"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Home Works")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Paper Path</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Paper Path</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->classRoom->class_name }}</td>
                        <td>{{ $item->subject->subject_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->paper_path }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="/delete-home-work/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#homework">Add Home Work</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Terms")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Term</th>
                        <th>Year</th>
                        <th>Duration</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Term</th>
                        <th>Year</th>
                        <th>Duration</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->term }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->duration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Past Papers")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Past Paper</th>
                        <th>Created By</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Past Paper</th>
                        <th>Created By</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->subject->subject_name }}</td>
                        <td>{{ $item->classRoom->class_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->paper_path }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-past-paper/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pastpapers">Add New Past Paper</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Fees")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Names</th>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Recieved By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Student Names</th>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Recieved By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->student->sfirst_name }} {{ $item->student->slast_name }}</td>
                        <td>{{ $item->term['term'] }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                            <a href="/get-fees-for-particular-student/{{ $item->id }}"><button class="btn btn-datatable btn-icon btn-info" title="view payment details"><i class="fa fa-info"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fees">Record Fees Payment</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Examination Marks")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject Name</th>
                        <th>Student</th>
                        <th>Score</th>
                        <th>Comment</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Subject Name</th>
                        <th>Student</th>
                        <th>Score</th>
                        <th>Comment</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->subjects->subject_name }}</td>
                        <td>{{ $item->students->sfirst_name }} {{ $item->students->slast_name }}</td>
                        <td>{{ $item->marks }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->classRooms->class_name }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>
                            <a href="/delete-single-exam-marks/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exammarks">Add Marks</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Employees")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Telephone</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Telephone</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->efirst_name }} {{ $item->elast_name }}</td>
                        <td>{{ $item->District }}</td>
                        <td>{{ $item->Village }}</td>
                        <td>{{ $item->Telephone }}</td>
                        <td>{{ $item->user->name }}</td>
                        @if( $item->status == "suspended")
                        <td><div class="badge badge-warning badge-pill">{{ $item->status }}</div></td>
                        @else
                        <td><div class="badge badge-success badge-pill">{{ $item->status }}</div></td>
                        @endif
                        <td>
                            <a href="/suspend-employee/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-warning" title="suspend employee"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="/expel-employee/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger" title="expel employee"><i class="fa fa-trash"></i></button>
                            </a>
                            <a href="/get-particular-employee/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-info" title="view employee info"><i class="fa fa-info"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employees">Add New Employee</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Duties")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Teacher On Duty</th>
                        <th>Term</th>
                        <th>Week Number</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Teacher On Duty</th>
                        <th>Term</th>
                        <th>Week Number</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->teacher->efirst_name }} {{ $item->teacher->elast_name }}</td>
                        <td>{{ $item->term->term }}</td>
                        <td>{{ $item->week }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-duty-information/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#duties">Add Teachers Duty</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Public Days")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Public Day</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Public Day</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td style="text-transform:capitalize">{{ $item->public_day }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-public-day/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicday">Add Public Day</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Class Rooms")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Class Name</th>
                        <th>Stream</th>
                        <th>Total Fees</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Class Name</th>
                        <th>Stream</th>
                        <th>Total Fees</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->streams->stream_name }}</td>
                        <td>{{ $item->fees_amount }}</td>
                        <td>{{ $item->users['name'] }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-class/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                            <button class="btn btn-datatable btn-icon btn-info"><i class="fa fa-info"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#classrooms">Add New Class Room</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Streams")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Stream Name</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Stream Name</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->stream_name }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/delete-stream/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#classrooms">Add New Stream</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Students")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Former School</th>
                        <th>Photograph</th>
                        <th>Parent/Guardian</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Former School</th>
                        <th>Photograph</th>
                        <th>Parent/Guardian</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td><a href="/get-single-exam-marks-for-one-student/{{ $item->id }}" style="text-decoration:none">{{ $item->sfirst_name }} {{ $item->slast_name }}</a></td>
                        <td>{{ $item->former_school }}</td>
                        <td>{{ $item->image_path }}</td>
                        <td>{{ $item->guardian->pfirst_name }} {{ $item->guardian->plast_name }}</td>
                        <td>{{ $item->classRooms["class_name"] }}</td>
                        <td>{{ $item->user->name }}</td>
                        @if( $item->status == "suspended")
                        <td><div class="badge badge-warning badge-pill">{{ $item->status }}</div></td>
                        @else
                        <td><div class="badge badge-success badge-pill">{{ $item->status }}</div></td>
                        @endif
                        <td>
                            <a href="/suspend-student/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-warning" title="suspend student"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="/expel-student/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-danger" title="expel student"><i class="fa fa-trash"></i></button>
                            </a>
                            <a href="/get-particular-student/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-info" title="view student info"><i class="fa fa-info"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#student">Add New Student</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Parents")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>RelationShip</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Telephone</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>RelationShip</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Telephone</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $index=> $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->pfirst_name }} {{ $item->plast_name }}</td>
                        <td>{{ $item->RelationShip }}</td>
                        <td>{{ $item->District }}</td>
                        <td>{{ $item->Village }}</td>
                        <td>{{ $item->Telephone }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-primary"><i class="fa fa-edit"></i></button>
                            {{-- <a href="/get-particular-parent/{{ $item->id }}" style="text-decoration:none">
                                <button class="btn btn-datatable btn-icon btn-info"><i class="fa fa-info"></i></button>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#parents">Add New Parent</button>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Student Information")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover table-primary" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Names</th>
                        <th>Gender</th>
                        <th>Parent / Guardian</th>
                        <th>Student Class</th>
                        <th>Student former School</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Telephone</th>
                        <th>Studying Status</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $collection->sfirst_name }} {{ $collection->slast_name }} </td>
                        <td>{{ $collection->gender }}</td>
                        <td>{{ $collection->guardian->pfirst_name }} {{ $collection->guardian->plast_name }}</td>
                        <td>{{ $collection->classRooms->class_name }}</td>
                        <td>{{ $collection->former_school }}</td>
                        <td>{{ $collection->guardian->District }}</td>
                        <td>{{ $collection->guardian->Village }}</td>
                        <td>{{ $collection->guardian->Telephone }}</td>
                        <td>{{ $collection->status }}</td>
                        <td>{{ $collection->user->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(request()->route()->getName() == "My Marks")
<div class="card mb-4">
    <div class="card-header">Report</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover table-primary" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Names</th>
                        <th>Class</th>
                        <th>subject</th>
                        <th>Term</th>
                        <th>Marks</th>
                        <th>Teachers Comment</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->sfirst_name }} {{ $item->slast_name }} </td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->term }}</td>
                        <td>{{ $item->marks }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td>Sum</td>
                    <td></td>
                    <td></td>
                    <td>Total Marks</td>
                    <td>{{ $sum }}</td>
                    <td>Position:</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Employee Info")
<div class="card mb-4">
    <div class="card-header">@if($collection->gender == 'Male') Mr. {{ $collection->elast_name }} {{ $collection->efirst_name }} @else
        Mrs. {{ $collection->elast_name }} {{ $collection->efirst_name }} @endif
    </div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover table-primary" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th>Names</th> --}}
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>NIN</th>
                        <th>Telephone</th>
                        <th>Level Of Education</th>
                        <th>Certification</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td>{{ $collection->efirst_name }} {{ $collection->elast_name }}</td> --}}
                        <td>{{ $collection->date_of_birth }}</td>
                        <td>{{ $collection->gender }}</td>
                        <td>{{ $collection->District }}</td>
                        <td>{{ $collection->Village }}</td>
                        <td>{{ $collection->NIN }}</td>
                        <td>{{ $collection->Telephone }}</td>
                        <td>{{ $collection->level_of_education }}</td>
                        <td>{{ $collection->certificates }}</td>
                        <td>{{ $collection->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-warning"><i class="fa fa-times"></i></button>
                            <button class="btn btn-datatable btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(request()->route()->getName() == "Students Payment")
<div class="card mb-4">
    <div class="card-header">Student Payment Records</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover table-primary" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Names</th>
                        <th>Class</th>
                        <th>Payment Dates</th>
                        <th>Amount</th>
                        <th>Term</th>
                        <th>Recieved By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->sfirst_name }} {{ $item->slast_name }} </td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ number_format($item->amount) }} /=</td>
                        <td>{{ $item->term }}</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Amount Paid</td>
                    <td>{{ number_format($sum) }} /=</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endif
@include('admin_layouts.modals')
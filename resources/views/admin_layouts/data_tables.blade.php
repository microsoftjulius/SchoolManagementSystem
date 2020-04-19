@if(request()->route()->getName() == "Time Tables")
<div class="card mb-4">
    <div class="card-header">{{ request()->route()->getName() }}</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Time Table</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Class Name</th>
                        <th>Time Table</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->classroom->class_name }}</td>
                        <td>{{ $item->time_table }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Teacher</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Teacher</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->subject_code }}</td>
                        <td>{{ $item->teachers->efirst_name }} {{ $item->teachers->elast_name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
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
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Paper Path</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->classRoom->class_name }}</td>
                        <td>{{ $item->subject->subject_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->paper_path }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                        <th>Term</th>
                        <th>Year</th>
                        <th>Duration</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Term</th>
                        <th>Year</th>
                        <th>Duration</th>
                        <th>Date of Creation</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->term }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->duration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
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
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->subject->subject_name }}</td>
                        <td>{{ $item->classRoom->class_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->paper_path }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                        <th>Student Names</th>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Recieved By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Names</th>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Recieved By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->student->sfirst_name }} {{ $item->student->slast_name }}</td>
                        <td>{{ number_format($item->term['term']) }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                        <th>Subject Name</th>
                        <th>Student</th>
                        <th>Score</th>
                        <th>Commect</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        <th>Student</th>
                        <th>Score</th>
                        <th>Commect</th>
                        <th>Class</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->subjects->subject_name }}</td>
                        <td>{{ $item->students->sfirst_name }} {{ $item->students->slast_name }}</td>
                        <td>{{ $item->marks }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->classRooms->class_name }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif


@if(request()->route()->getName() == "Employees")
<div class="card mb-4">
    <div class="card-header">DataTable Example</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Names</th>
                        <th>Created By</th>
                        <th>Date Of Birth</th>
                        <th>Role</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>National Id Number</th>
                        <th>Telephone</th>
                        <th>Highest Education Level</th>
                        <th>Certificate(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Names</th>
                        <th>Created By</th>
                        <th>Date Of Birth</th>
                        <th>Role</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>National Id Number</th>
                        <th>Telephone</th>
                        <th>Highest Education Level</th>
                        <th>Certificate(s)</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->efirst_name }} {{ $item->elast_name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->role_id }}</td>
                        <td>{{ $item->District }}</td>
                        <td>{{ $item->Village }}</td>
                        <td>{{ $item->NIN }}</td>
                        <td>{{ $item->Telephone }}</td>
                        <td>{{ $item->level_of_education }}</td>
                        <td>{{ $item->certificates }}</td>
                        <td>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-trash"></i></button><button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
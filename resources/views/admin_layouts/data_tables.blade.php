
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
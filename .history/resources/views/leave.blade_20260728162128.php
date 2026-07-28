@include('layout.header')

<!-- DASHBOARD -->
<div class="dashboard">
    <div class="row g-4">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            @endif
            <div class="card-box">
                <div class="title">
                    <i class="bi bi-calendar-check"></i>
                    Check Leave Status
                </div>

                <!-- Filter Form -->
                <div class="filter-form mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control" id="fromDate" value="2026-01-01">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control" id="toDate" value="2026-07-31">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="filterStatus">
                                <option value="">All Status</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100" id="filterBtn">
                                <i class="bi bi-funnel"></i> Filter
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="search-box">
                                <i class="bi bi-search"></i>
                                <input type="text" class="form-control" id="customSearch"
                                    placeholder="Search by Name, Account ID, or Purpose...">
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-success" id="resetBtn">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                            <button class="btn btn-info" id="addLeaveBtn" data-bs-toggle="modal"
                                data-bs-target="#leaveModal">
                                <i class="bi bi-plus-circle"></i> Add Leave
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="leaveTable" class="table table-dark table-hover table-striped">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Account Id</th>
                                <th>Name</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Leave Purpose</th>
                                <th>Contact No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sno =1 @endphp
                            @foreach ($UserAllLeave as $data )
                            
                           
                            <tr>
                                <td>{{ $sno++ }}</td>
                                <td>{{ $data->account_id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->leavefrom }}</td>
                                <td>{{ $data->leaveto }}</td>
                                <td>{{$data->leavepurpose}}</td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    @if($data->status == 'Approved')
                                    <span class="badge bg-success">Approved</span></td>
                                    @elseif($data->status == 'Pending')
                                     <span class="badge bg-danger">Pending</span></td>
                                     @elseif 

                                     @else
                                      <span class="badge bg-danger">Pending</span></td>
                                     @endif
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" title="Edit" onclick="editLeave(1)">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLeave(1)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                             @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title form-labelModal" id="leaveModalLabel">
                    <i class="bi bi-calendar-plus"></i> Apply Leave
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="leaveForm" method="POST" action="{{ route('leaveInsert') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Department -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Department</label>
                             <input type="text" class="form-control" name="department"  value="{{ $data->designation }}" readonly>
                            
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly>
                        </div>

                        <!-- Account ID -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Account Id</label>
                            <input type="text" class="form-control" name="account_id" value="{{ $data->account_id }}" readonly>
                        </div>

                        <!-- Leave Type -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave Type</label>
                            <div class="d-flex gap-3 mt-2" >
                                <div class="form-check" >
                                    <input class="form-check-input" type="radio" name="leaveType" id="halfDay"
                                        value="Half Day" checked>
                                    <label class="form-check-label" for="halfDay">Half Day</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="leaveType" id="fullDay"
                                        value="Full Day">
                                    <label class="form-check-label" for="fullDay">Full Day</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="leaveType" id="complimentary"
                                        value="Complimentary">
                                    <label class="form-check-label" for="complimentary">Complimentary</label>
                                </div>
                            </div>
                        </div>

                        <!-- Leave From -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave From</label>
                            <input type="date" class="form-control" name="leavefrom" id="leaveFrom" required>
                        </div>

                        <!-- Leave To -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave To</label>
                            <input type="date" class="form-control" name="leaveto" id="leaveTo" required>
                        </div>

                        <!-- Leave Purpose
                        <div class="col-md-12">
                            <label class="form-label form-labelModal">Leave Purpose</label>
                            <select class="form-control" required>
                                <option value="">Select Purpose</option>
                                <option value="Personal">Personal</option>
                                <option value="Fever">Fever</option>
                                <option value="Vacation">Vacation</option>
                                <option value="Medical Emergency">Medical Emergency</option>
                                <option value="Personal Work">Personal Work</option>
                                <option value="Family Event">Family Event</option>
                                <option value="Other">Other</option>
                            </select>
                        </div> -->

                        <!-- Leave Reason -->
                        <div class="col-md-12">
                            <label class="form-label form-labelModal" >Leave Reason</label>
                            <select class="form-control" name="leavereason" required>
                                <option value="" selected>Reason</option>
                                <option value="urgentwork" >Urgent Work</option>
                                <option value="personalwork">Personal Work</option>
                                <option value="sickleave">Sick Leave</option>
                                <option value="scheduleleave">Schedule Leave</option>
                                <option value="Other">Other</option>
                            </select>
                            <!-- <textarea class="form-control" rows="2" placeholder="Enter reason for leave..."></textarea> -->
                        </div>

                        <!-- Reason (Additional) -->
                        <div class="col-md-12">
                            <label class="form-label form-labelModal">Leave Purpose</label>
                            <textarea class="form-control" rows="2" name="leavepurpose"
                                placeholder="Additional reason if any..."></textarea>
                        </div>

                        <!-- Address During Leave -->
                        <div class="col-md-12">
                            <label class="form-label form-labelModal">Address During Leave</label>
                            <textarea class="form-control" rows="2" name="address"
                                placeholder="Enter address during leave">{{ $data->address }}</textarea>
                        </div>

                        <!-- Contact No During Leave -->
                        <div class="col-md-12">
                            <label class="form-label  form-labelModal">Contact No. During Leave</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $data->mobile }}"
                                placeholder="Enter contact number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Submit Leave
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')

<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#leaveTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "zeroRecords": "No matching records found"
            },
            "columnDefs": [
                { "orderable": false, "targets": 8 } // Disable sorting on Action column
            ],
            "order": [[0, 'asc']]
        });

        // Custom Search - filter by Name, Account ID, or Purpose
        $('#customSearch').on('keyup', function () {
            table.search(this.value).draw();
        });

        // Filter by Status
        $('#filterStatus').on('change', function () {
            var status = $(this).val();
            if (status) {
                $.fn.dataTable.ext.search.push(
                    function (settings, data, dataIndex) {
                        var statusCell = data[7]; // Status is at index 7
                        return statusCell.includes(status);
                    }
                );
            } else {
                $.fn.dataTable.ext.search.pop();
            }
            table.draw();
        });

        // Date range filter (From Date - To Date)
        $('#filterBtn').on('click', function () {
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();

            if (fromDate && toDate) {
                $.fn.dataTable.ext.search.push(
                    function (settings, data, dataIndex) {
                        var fromDateCell = data[3]; // From Date is at index 3
                        var toDateCell = data[4];   // To Date is at index 4

                        // Compare dates (convert to timestamp for comparison)
                        var fromDateTimestamp = new Date(fromDate).getTime();
                        var toDateTimestamp = new Date(toDate).getTime();
                        var cellFromTimestamp = new Date(fromDateCell).getTime();
                        var cellToTimestamp = new Date(toDateCell).getTime();

                        return cellFromTimestamp >= fromDateTimestamp && cellToTimestamp <= toDateTimestamp;
                    }
                );
            } else {
                $.fn.dataTable.ext.search.pop();
            }
            table.draw();
        });

        // Reset filters
        $('#resetBtn').on('click', function () {
            $('#fromDate').val('2026-01-01');
            $('#toDate').val('2026-07-31');
            $('#filterStatus').val('');
            $('#customSearch').val('');

            // Clear custom filters
            $.fn.dataTable.ext.search = [];
            table.search('').draw();
        });

        // Add Leave button
        $('#addLeaveBtn').on('click', function () {
            alert('Add new leave record functionality here');
        });
    });

    // Delete confirmation
    function deleteLeave(id) {
        if (confirm('Are you sure you want to cancel this leave?')) {
            // Your delete logic here
            alert('Leave #' + id + ' cancelled successfully!');
        }
    }

    // Edit function
    function editLeave(id) {
        // Your edit logic here
        alert('Edit leave #' + id);
    }
</script>

<!-- Additional styles to match your theme -->
<style>
    /* Form styling */
    .filter-form {
        background: rgba(9, 20, 38, 0.6);
        padding: 20px;
        border-radius: 15px;
        border: 1px solid rgba(91, 140, 255, 0.1);
        margin-bottom: 25px;
    }

    .filter-form .form-label {
        color: #5b8cff;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 6px;
    }

    .filter-form .form-control {
        background: #091426;
        border: 1px solid rgba(91, 140, 255, 0.2);
        color: #fff;
        border-radius: 10px;
        padding: 10px 14px;
        transition: all 0.3s ease;
    }

    .filter-form .form-control:focus {
        border-color: #5b8cff;
        box-shadow: 0 0 0 0.25rem rgba(91, 140, 255, 0.25);
        background: #091426;
        color: #fff;
    }

    .filter-form .form-control::placeholder {
        color: #6d89b8;
    }

    .filter-form .form-control option {
        background: #0e1a2b;
    }

    /* Search box with icon */
    .search-box {
        position: relative;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #5b8cff;
        font-size: 18px;
        z-index: 10;
    }

    .search-box .form-control {
        padding-left: 42px;
    }

    /* Buttons */
    .btn-primary {
        background: #5b8cff;
        border-color: #5b8cff;
    }

    .btn-primary:hover {
        background: #4a7ae6;
        border-color: #4a7ae6;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(91, 140, 255, 0.3);
    }

    .btn-success {
        background: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-info {
        background: #17a2b8;
        border-color: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background: #138496;
        border-color: #117a8b;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(23, 162, 184, 0.3);
        color: #fff;
    }

    .btn {
        transition: all 0.3s ease;
    }

    /* DataTable dark theme override */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: #b8cbea !important;
    }

    .dataTables_wrapper .dataTables_filter input {
        background: #091426;
        border: 1px solid rgba(91, 140, 255, 0.2);
        color: #fff;
        border-radius: 8px;
        padding: 6px 12px;
        margin-left: 8px;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #5b8cff;
        box-shadow: 0 0 0 0.25rem rgba(91, 140, 255, 0.25);
        outline: none;
    }

    .dataTables_wrapper .dataTables_length select {
        background: #091426;
        border: 1px solid rgba(91, 140, 255, 0.2);
        color: #fff;
        border-radius: 8px;
        padding: 4px 8px;
        margin: 0 4px;
    }

    .dataTables_wrapper .dataTables_length select:focus {
        border-color: #5b8cff;
        outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #b8cbea !important;
        border-radius: 8px !important;
        border: 1px solid rgba(91, 140, 255, 0.2) !important;
        background: #091426 !important;
        margin: 0 3px !important;
        padding: 6px 14px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #1b4bff !important;
        color: #fff !important;
        border-color: #1b4bff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #5b8cff !important;
        color: #fff !important;
        border-color: #5b8cff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        opacity: 0.4 !important;
        cursor: not-allowed !important;
    }

    /* Table styling */
    .table-dark {
        --bs-table-bg: #0e1a2b;
        --bs-table-border-color: rgba(91, 140, 255, 0.1);
    }

    .table-dark thead th {
        color: #5b8cff;
        border-bottom: 2px solid rgba(91, 140, 255, 0.2);
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-dark tbody td {
        color: #b8cbea;
        vertical-align: middle;
        border-bottom: 1px solid rgba(91, 140, 255, 0.05);
    }

    .table-dark tbody tr:hover {
        background: #14243e !important;
    }

    /* Status badges */
    .badge {
        padding: 6px 12px;
        font-weight: 500;
        border-radius: 20px;
    }

    /* Action buttons */
    .btn-sm {
        padding: 5px 10px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-sm:hover {
        transform: scale(1.1);
    }

    .btn-danger:hover {
        background: #c82333;
        border-color: #bd2130;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .table-responsive {
            font-size: 13px;
        }

        .btn-sm {
            padding: 3px 7px;
            font-size: 12px;
        }

        .filter-form .row .col-md-3,
        .filter-form .row .col-md-6 {
            margin-bottom: 10px;
        }

        .filter-form .row .col-md-6.text-end {
            text-align: start !important;
        }
    }

    .form-labelModal{
        color:#000 !important
        
    }
    label.form-check-label {
    color: #000 !important;
}
</style>
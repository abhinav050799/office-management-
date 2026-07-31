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
                            @php $sno = 1 @endphp
                            @foreach ($UserAllLeave as $leave)


                                <tr>
                                    <td>{{ $sno++ }}</td>
                                    <td>{{ $leave->account_id }}</td>
                                    <td>{{ $leave->name }}</td>
                                    <td>{{ $leave->leavefrom }}</td>
                                    <td>{{ $leave->leaveto }}</td>
                                    <td>{{$leave->leavepurpose}}</td>
                                    <td>{{ $leave->phone }}</td>
                                    <td>
                                        @if($leave->status == 'Approved')
                                                <span class="badge bg-success">Approved</span>
                                            </td>
                                        @elseif($leave->status == 'Pending')
                                        <span class="badge bg-danger">Pending</span></td>
                                    @elseif($leave->status == 'Rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-danger">{{ $leave->status }}</span></td>
                                    @endif
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary me-1 editBtn" title="Edit"
                                            data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $leave->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="{{route('deleteLeave')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="dlt_id" value="{{ $leave->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        </form>
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
                            <input type="text" class="form-control" name="department" value="{{ $data->department }}"
                                readonly>

                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly>
                        </div>

                        <!-- Account ID -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Account Id</label>
                            <input type="text" class="form-control" name="account_id" value="{{ $data->account_id }}"
                                readonly>
                        </div>

                        <!-- Leave Type -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave Type</label>
                            <div class="d-flex gap-3 mt-2">
                                <div class="form-check">
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
                            <label class="form-label form-labelModal">Leave Reason</label>
                            <select class="form-control" name="leavereason" required>
                                <option value="" selected>Reason</option>
                                <option value="urgentwork">Urgent Work</option>
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


<!-- Edit Modal -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title form-labelModal" id="leaveModalLabel">
                    <i class="bi bi-calendar-plus"></i> Edit Leave
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editLeaveForm" method="POST" action="{{ route('updateLeave') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <!-- Department -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Department</label>
                            <input type="text" class="form-control" name="department" id="edit_department" value=""
                                readonly>

                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" readonly>
                        </div>

                        <!-- Account ID -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Account Id</label>
                            <input type="text" class="form-control" name="account_id" id="edit_account_id" value=""
                                readonly>
                        </div>

                        <!-- Leave Type -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave Type</label>
                            <div class="d-flex gap-3 mt-2">
                                <div class="form-check">
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
                            <input type="date" class="form-control" name="leavefrom" id="edit_leavefrom" required>
                        </div>

                        <!-- Leave To -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Leave To</label>
                            <input type="date" class="form-control" name="leaveto" id="edit_leaveto" required>
                        </div>

                        <!-- Leave Reason -->
                        <div class="col-md-12">
                            <label class="form-label form-labelModal">Leave Reason</label>
                            <select class="form-control" name="leavereason" id="edit_leavereason" required>
                                <option value="" selected>Reason</option>
                                <option value="urgentwork">Urgent Work</option>
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
                            <textarea class="form-control" rows="2" name="leavepurpose" id="edit_leavepurpose"
                                placeholder="Additional reason if any..."></textarea>
                        </div>

                        <!-- Address During Leave -->
                        <div class="col-md-12">
                            <label class="form-label form-labelModal">Address During Leave</label>
                            <textarea class="form-control" rows="2" name="address" id="edit_address"
                                placeholder="Enter address during leave"></textarea>
                        </div>

                        <!-- Contact No During Leave -->
                        <div class="col-md-12">
                            <label class="form-label  form-labelModal">Contact No. During Leave</label>
                            <input type="tel" class="form-control" name="phone" id="edit_phone" value=""
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


<!-- DataTables CSS & JS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> -->

@include('layout.footer')
<script>
   document.addEventListener("DOMContentLoaded", function () {

    const table = $('#leaveTable').DataTable({
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            infoFiltered: "(filtered from _MAX_ total entries)",
            zeroRecords: "No Data Found",
            emptyTable: "No Data Found"
        },
        columnDefs: [
            { orderable: false, targets: 8 }
        ],
        order: [[0, "asc"]]
    });

    // Search
    document.getElementById("customSearch").addEventListener("keyup", function () {
        table.search(this.value).draw();
    });

    // Date + Status Filter
   $.fn.dataTable.ext.search.push(function (settings, data) {

    const fromDate = document.getElementById("fromDate").value;
    const toDate = document.getElementById("toDate").value;
    const status = document.getElementById("filterStatus").value;

    const rowFromDate = new Date(data[3]);
    const rowToDate = new Date(data[4]);

    const rowStatus = data[7].replace(/<[^>]*>/g, "").trim();

    // Date Filter
    if (fromDate && rowFromDate < new Date(fromDate)) {
        return false;
    }

    if (toDate && rowToDate > new Date(toDate)) {
        return false;
    }

    // Status Filter
    if (status !== "" && rowStatus !== status) {
        return false;
    }

    return true;
});

    // Filter Button
    document.getElementById("filterBtn").addEventListener("click", function (e) {
        e.preventDefault();
        table.draw();
    });

    // Reset Button
    document.getElementById("resetBtn").addEventListener("click", function () {

        document.getElementById("fromDate").value = "2026-01-01";
        document.getElementById("toDate").value = "2026-07-31";
        document.getElementById("filterStatus").value = "";
        document.getElementById("customSearch").value = "";

        table.search("").draw();
    });

// });

        // Add Leave button
        $('#addLeaveBtn').on('click', function () {
            alert('Add new leave record functionality here');
        });
    });



</script>

<script>
    document.querySelectorAll('.editBtn').forEach(function (button) {

        button.addEventListener('click', function () {

            let id = this.dataset.id;   // data-id ki value

            fetch("{{ route('getidData') }}?id=" + id)
                .then(response => response.json())
                .then(response => {

                    console.log(response);

                    if (response.status) {
                        document.getElementById('edit_id').value = response.data.id;
                        document.getElementById('edit_name').value = response.data.name;
                        document.getElementById('edit_department').value = response.data.department;
                        document.getElementById('edit_account_id').value = response.data.account_id;
                        document.getElementById('edit_leavefrom').value = response.data.leavefrom;
                        document.getElementById('edit_leaveto').value = response.data.leaveto;
                        document.getElementById('edit_leavepurpose').value = response.data.leavepurpose;
                        document.getElementById('edit_address').value = response.data.address;
                        document.getElementById('edit_phone').value = response.data.phone;
                        document.getElementById('edit_leavereason').value =
                            response.data.leavereason;
                        // Leave Type Radio
                        let radio = document.querySelector(
                            '#editLeaveForm input[name="leaveType"][value="' + response.data.leavetype + '"]'
                        );

                        if (radio) {
                            radio.checked = true;
                        }

                        // Leave Reason
                        document.querySelector('select[name="leavereason"]').value = response.data.leavereason;
                    }

                })
                .catch(error => {
                    console.log(error);
                });

        });

    });
</script>







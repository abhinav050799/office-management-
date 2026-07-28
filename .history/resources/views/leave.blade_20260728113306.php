@include('layout.header')

<!-- DASHBOARD -->
<div class="dashboard">
    <div class="row g-4">
        <div class="col-12">
            <div class="card-box">
                <div class="title">
                    <i class="bi bi-calendar-check"></i>
                    Check Leave Status
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
                            <tr>
                                <td>1</td>
                                <td>SI/DDN/IT/0057</td>
                                <td>Abhinav Amoli</td>
                                <td>2026-05-13</td>
                                <td>2026-05-13</td>
                                <td>Personal</td>
                                <td>7983034032</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SI/DDN/IT/0057</td>
                                <td>Abhinav Amoli</td>
                                <td>2026-05-09</td>
                                <td>2026-05-09</td>
                                <td>Fever</td>
                                <td>7983034032</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
        $('#leaveTable').DataTable({
            // Enable search, pagination, and sorting
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
            "order": [[0, 'asc']] // Sort by S.no by default
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

    .btn-primary {
        background: #5b8cff;
        border-color: #5b8cff;
    }

    .btn-primary:hover {
        background: #4a7ae6;
        border-color: #4a7ae6;
    }

    .btn-danger {
        background: #dc3545;
        border-color: #dc3545;
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
    }
</style>
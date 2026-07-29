@include('layout.header')

<div class="dashboard">
    <div class="row g-4">
        <div class="col-12">
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
                                <input type="text" class="form-control" id="customSearch" placeholder="Search by Name, Account ID, or Purpose...">
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-success" id="resetBtn">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                            <button class="btn btn-info" id="addLeaveBtn" data-bs-toggle="modal" data-bs-target="#leaveModal">
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
                                                        

                                <tr>
                                    <td>1</td>
                                    <td>121212</td>
                                    <td>Ankit chauhan</td>
                                    <td>2026-07-31</td>
                                    <td>2026-07-31</td>
                                    <td>sick se mane</td>
                                    <td>1234567890</td>
                                    <td>
                                                                                <span class="badge bg-danger">Pending</span></td>
                                                                        <td>
                                        <button type="submit" class="btn btn-sm btn-primary me-1 editBtn" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="2">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="http://127.0.0.1:8000/deleteLeave" method="POST">
                                            <input type="hidden" name="_token" value="VycmwSRx059My78QqxUXTeAzXA8GQPJ1WxPUt96m" autocomplete="off">                                            <input type="hidden" name="dlt_id" value="2">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        </form>
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
@include('layout.header')

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
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Time in</th>
                                <th>Time out</th>
                                <th>Working Hour</th>
                                <th>Date</th>
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
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@include('layout.header')

<div class="dashboard">
    <div class="card-box">
                <div class="title">
                    <i class="bi bi-calendar-check"></i>
                    Expenses Report
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
                            <button class="btn btn-info" id="addExpenseBtn" data-bs-toggle="modal"
                                data-bs-target="#expenseModal">
                                <i class="bi bi-plus-circle"></i> Add Expense
                            </button>
                        </div>
                    </div>
                </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="table-responsive">
                <table id="attendTable" class="table table-dark table-hover table-striped">
                <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Expenses Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $sno = 1;
                    @endphp
                    @foreach ($expensise as $expense)
                    <tr>
                        <td>
                            {{ $sno++ }}
                        </td>
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->created_at }}</td>
                        <td>
                            <a>Edit</a>
                            <form>
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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


<!-- Add expenses Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title form-labelModal" id="leaveModalLabel">
                    <i class="bi bi-calendar-plus"></i> Apply Leave
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="leaveForm" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Department -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Product Name</label>
                            <input type="text" class="form-control" name="department" value=""
                                readonly>

                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label form-labelModal">Product Quantity</label>
                            <input type="text" class="form-control" name="name" value="" >
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

@include('layout.footer')
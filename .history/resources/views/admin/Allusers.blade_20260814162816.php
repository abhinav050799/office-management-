@include('layout.header')

<div class="dashboard">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-box">
        <div class="title">
            <i class="bi bi-calendar-check"></i>
            All Users Report
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
                        <i class="bi bi-plus-circle"></i> Add User
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
                                <th>name</th>
                                <th>email</th>
                                <th>department</th>
                                <th>Date</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp
                            @foreach ($users as $userData)
                                <tr>
                                    <td>
                                        {{ $sno++ }}
                                    </td>
                                    <td>{{ $userData->name }}</td>
                                    <td>{{ $userData->email }}</td>
                                    <td>{{ $userData->department }}</td>
                                    <td>{{ $userData->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-id="{{ $userData->id }}"
                                            data-bs-target="#expenseEditModal{{ $userData->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('expenses.dlt', $userData->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>expenseEditModal
                                </tr>
                                <!-- Edit Expense Modal -->
                                <div class="modal fade" id="expenseEditModal{{ $userData->id }}" tabindex="-1"
                                    aria-labelledby="expenseEditModalLabel{{ $userData->id }}" aria-hidden="true">

                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">

                                                <h5 class="modal-title form-labelModal" id="expenseModalLabel">
                                                    <i class="bi bi-person-plus-fill"></i>
                                                    Edit User
                                                </h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>

                                            </div>


                                            <!-- Form -->
                                            <form action="{{ route('adminUpdateuser',$userData->id) }}" method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="modal-body">

                                                    <div class="row g-3">

                                                        <!-- Full Name -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-person me-1"></i>
                                                                Full Name
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </span>

                                                                <input type="text" name="name" id="name"
                                                                    class="form-control" placeholder="Tony Stark"
                                                                    value="{{ $userData->name }}" required>

                                                            </div>

                                                        </div>


                                                        <!-- Email -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-envelope me-1"></i>
                                                                Email
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </span>

                                                                <input type="email" name="email" id="email"
                                                                    class="form-control" placeholder="tony@stark.com"
                                                                    value="{{ $userData->email }}" required>

                                                            </div>

                                                        </div>


                                                        <!-- Department -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-diagram-3 me-1"></i>
                                                                Department
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-briefcase"></i>
                                                                </span>

                                                                <select class="form-select" name="department"
                                                                    id="department" required>

                                                                    <option value="{{ $userData->department }}" 
                                                                        selected>
                                                                        {{ $userData->department }}
                                                                    </option>

                                                                    <option value="R&D"
                                                                    {{ $userData->department == 'R&D' ? 'selected' : '' }}>
                                                                    R&D · Engineering
                                                                    </option>

                                                                    <option value="Operations" {{ $userData->department == 'Operations' ? 'selected' : '' }}>
                                                                        Operations
                                                                    </option>

                                                                    <option value="Finance" {{ $userData->department = 'Finance' ? 'selected' : '' }}>
                                                                        Finance
                                                                    </option>

                                                                    <option value="HR" {{ $userData->department = 'HR' ? 'selected' : '' }}>
                                                                        Human Resources
                                                                    </option>

                                                                    <option value="IT" {{ $userData->department = 'IT' ? 'selected' : '' }}>
                                                                        IT · Infrastructure
                                                                    </option>

                                                                    <option value="Management" {{ $userData->department = 'Management' ? 'selected' }}>
                                                                        Management
                                                                    </option>

                                                                </select>

                                                            </div>

                                                        </div>


                                                        <!-- Role -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-person-badge me-1"></i>
                                                                Role
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-star"></i>
                                                                </span>

                                                                <select class="form-select" name="role" id="role" required>

                                                                    <option value="{{ $userData->role }}" disabled selected>
                                                                        {{ $userData->role }}
                                                                    </option>

                                                                    <option value="admin">
                                                                        Admin
                                                                    </option>

                                                                    <option value="manager">
                                                                        Manager
                                                                    </option>

                                                                    <option value="employee">
                                                                        Employee
                                                                    </option>

                                                                    <option value="intern">
                                                                        Intern
                                                                    </option>

                                                                </select>

                                                            </div>

                                                        </div>


                                                        <!-- Password -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-lock me-1"></i>
                                                                Password
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-key"></i>
                                                                </span>

                                                                <input type="password" name="password" id="password"
                                                                    class="form-control" placeholder="••••••••">

                                                            </div>

                                                        </div>


                                                        <!-- Confirm Password -->
                                                        <div class="col-md-6">

                                                            <label class="form-label form-labelModal">
                                                                <i class="bi bi-shield-lock me-1"></i>
                                                                Confirm Password
                                                            </label>

                                                            <div class="input-group-custom">

                                                                <span class="input-icon">
                                                                    <i class="bi bi-check-circle"></i>
                                                                </span>

                                                                <input type="password" name="password_confirmation"
                                                                    id="password_confirmation" class="form-control"
                                                                    placeholder="••••••••">

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Footer -->
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                                        <i class="bi bi-x-circle"></i>
                                                        Close

                                                    </button>


                                                    <button type="submit" class="btn btn-primary">

                                                        <i class="bi bi-person-plus"></i>
                                                        Update User

                                                    </button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Add User Modal -->
    <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <h5 class="modal-title form-labelModal" id="expenseModalLabel">
                        <i class="bi bi-person-plus-fill"></i>
                        Add User
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- Form -->
                <form action="{{ route('adminregisteruser') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row g-3">

                            <!-- Full Name -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-person me-1"></i>
                                    Full Name
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Tony Stark" required>

                                </div>

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-envelope me-1"></i>
                                    Email
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="tony@stark.com" required>

                                </div>

                            </div>


                            <!-- Department -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-diagram-3 me-1"></i>
                                    Department
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </span>

                                    <select class="form-select" name="department" id="department" required>

                                        <option value="" disabled selected>
                                            Select department
                                        </option>

                                        <option value="R&D">
                                            R&D · Engineering
                                        </option>

                                        <option value="Operations">
                                            Operations
                                        </option>

                                        <option value="Finance">
                                            Finance
                                        </option>

                                        <option value="HR">
                                            Human Resources
                                        </option>

                                        <option value="IT">
                                            IT · Infrastructure
                                        </option>

                                        <option value="Management">
                                            Management
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <!-- Role -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-person-badge me-1"></i>
                                    Role
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-star"></i>
                                    </span>

                                    <select class="form-select" name="role" id="role" required>

                                        <option value="" disabled selected>
                                            Select role
                                        </option>

                                        <option value="admin">
                                            Admin
                                        </option>

                                        <option value="manager">
                                            Manager
                                        </option>

                                        <option value="employee">
                                            Employee
                                        </option>

                                        <option value="intern">
                                            Intern
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <!-- Password -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-lock me-1"></i>
                                    Password
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-key"></i>
                                    </span>

                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="••••••••" required>

                                </div>

                            </div>


                            <!-- Confirm Password -->
                            <div class="col-md-6">

                                <label class="form-label form-labelModal">
                                    <i class="bi bi-shield-lock me-1"></i>
                                    Confirm Password
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-icon">
                                        <i class="bi bi-check-circle"></i>
                                    </span>

                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="••••••••" required>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Footer -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                            <i class="bi bi-x-circle"></i>
                            Close

                        </button>


                        <button type="submit" class="btn btn-primary">

                            <i class="bi bi-person-plus"></i>
                            Register User

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    @include('layout.footer')
    <script>
        $(document).ready(function () {

            // Initialize DataTable
            let table = $('#attendTable').DataTable({

                pageLength: 10,

                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                dom: 'lrtip', // Hide default DataTable search

                language: {
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    zeroRecords: "No Data Found",
                    emptyTable: "No Data Found"
                },

                order: [[0, "asc"]]
            });


            // Custom Search
            $("#customSearch").on("keyup", function () {
                table.search($(this).val()).draw();
            });


            // Date Range Filter
            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {

                let fromDate = $("#fromDate").val();
                let toDate = $("#toDate").val();

                // Date Column (0=Sno,1=Name,2=Qty,3=Amount,4=Date)
                let rowDate = data[4];

                if (!rowDate) {
                    return true;
                }

                // If date contains time remove it
                rowDate = rowDate.split(" ")[0];

                let row = new Date(rowDate);
                let from = fromDate ? new Date(fromDate) : null;
                let to = toDate ? new Date(toDate) : null;

                if (from && row < from) {
                    return false;
                }

                if (to && row > to) {
                    return false;
                }

                return true;
            });


            // Filter Button
            $("#filterBtn").click(function (e) {
                e.preventDefault();
                table.draw();
            });


            // Auto Filter when date changes
            $("#fromDate, #toDate").on("change", function () {
                table.draw();
            });


            // Reset Button
            $("#resetBtn").click(function () {

                $("#fromDate").val("");
                $("#toDate").val("");
                $("#customSearch").val("");

                table.search("");

                table.draw();

            });

        });
    </script>
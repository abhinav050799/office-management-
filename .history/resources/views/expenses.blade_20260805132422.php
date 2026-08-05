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
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Added By</th>
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
                                    <td>{{ $expense->product_name }}</td>
                                    <td>{{ $expense->product_quantity }}</td>
                                    <td>{{ $expense->product_price }}</td>
                                    <td>{{ $expense->created_at }}</td>
                                    @if(session('department') == 'HR')
                                   <td>{{ $expense->name }}</td>
                                   
                                    <td>
                                        <button class="btn btn-primary" type="submit" data-id="{{ $expense->id }}"
                                            data-bs-toggle="modal" data-bs-target="#expenseEditModal"><i
                                                class="bi bi-pencil"></i></button>
                                        <form method="POST" action="{{ route('expenses.dlt', $expense->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Edit Expense Modal -->
                                <div class="modal fade" id="expenseEditModal" tabindex="-1"
                                    aria-labelledby="leaveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title form-labelModal" id="expenseModalLabel">
                                                    <i class="bi bi-calendar-plus"></i> Add Expense
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="expenseForm" method="POST"
                                                action="{{ route('expenses.update', $expense->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <!--Product Name -->
                                                        <div class="col-md-6">
                                                            <label class="form-label form-labelModal">Product Name</label>
                                                            <input type="text" class="form-control" name="product_name"
                                                                value="{{ $expense->product_name }}">

                                                        </div>

                                                        <!-- Product Quantity -->
                                                        <div class="col-md-6">
                                                            <label class="form-label form-labelModal">Product
                                                                Quantity</label>
                                                            <input type="number" class="form-control"
                                                                name="product_quantity"
                                                                value="{{ $expense->product_quantity }}">
                                                        </div>

                                                        <!-- Product Price -->
                                                        <div class="col-md-6 mb-2">
                                                            <label class="form-label form-labelModal">Product Price</label>
                                                            <input type="number" class="form-control" name="product_price"
                                                                value="{{ $expense->product_price }}" step="0.01">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bi bi-x-circle"></i> Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-check-circle"></i> Submit Leave
                                                        </button>
                                                    </div>
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


    <!-- Add expenses Modal -->
    <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title form-labelModal" id="expenseModalLabel">
                        <i class="bi bi-calendar-plus"></i> Add Expense
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="expenseForm" method="POST" action="{{ route('expenses.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <!--Product Name -->
                            <div class="col-md-6">
                                <label class="form-label form-labelModal">Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="">

                            </div>

                            <!-- Product Quantity -->
                            <div class="col-md-6">
                                <label class="form-label form-labelModal">Product Quantity</label>
                                <input type="number" class="form-control" name="product_quantity" value="">
                            </div>

                            <!-- Product Price -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label form-labelModal">Product Price</label>
                                <input type="number" class="form-control" name="product_price" value="" step="0.01">
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
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layout.footer')
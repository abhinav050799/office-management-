@include('layout.header')

<div class="dashboard">
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

                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
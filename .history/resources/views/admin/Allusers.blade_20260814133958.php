@include('admin.layout.header')



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



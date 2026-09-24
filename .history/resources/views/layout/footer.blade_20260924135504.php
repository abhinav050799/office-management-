    <!-- FOOTER -->


    <footer class="footer">


        <i class="bi bi-shield-check"></i>

        Stark Industries Enterprise Dashboard

        <br>

        © {{ date('') }} All Rights Reserved


    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    

    <!-- DataTables CSS & JS -->
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>

ClassicEditor
    .create(document.querySelector('#notificationMessage'))
    .then(editor => {
        console.log('Editor ready');
    })
    .catch(error => {
        console.error(error);
    });

</script>
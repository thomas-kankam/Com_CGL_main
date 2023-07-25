<script src="{{ asset('assets/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>

<!--Month-Current js -->
<script src="{{ asset('assets/js/month_current.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{ asset('assets/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
<script
    src="{{ asset('assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
</script>
<script src="{{ asset('assets/js/pages/dashboards/dashboard1.js') }}"></script>
<script>
    function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>

<script>
    $(document).ready(function() {

        $('#example').DataTable();

    });
</script>

<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteCategoryForm')
        form.action = '/entry/' + id
        $('#deleteModal').modal('show')
    }
    // $(document).ready(function () {
    //     $('#deleteModal').on('show.bs.modal', function (event) {
    //         var button = $(event.relatedTarget);
    //         var blacklist = button.data('blacklist');
    //         var form = $('#deleteForm');

    //         form.attr('action', form.attr('action').replace('blacklists/{id}', blacklist));
    //     });
    // });
</script>

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/js/main.js') }}"></script>

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

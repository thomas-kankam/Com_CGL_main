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
    // Get all canvas elements with a specific data attribute
    var canvases = document.querySelectorAll('canvas[data-color]');

    // Loop through each canvas and set the background color
    canvases.forEach(function(canvas) {
        var color = canvas.getAttribute('data-color');
        canvas.style.backgroundColor = color;
    });
</script>

<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteCategoryForm')
        form.action = '/entry/' + id
        $('#deleteModal').modal('show')
    }
</script>

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    function changeColor(event) {
        var color = event.value;
        var canvas = document.getElementById('square'); // Change 'square' to the actual ID of the canvas element
        canvas.style.backgroundColor = color;
    }
</script>
<script>
    function changeColor2(event) {
        var color = event.value;
        var canvas = document.getElementById('square2'); // Change 'square' to the actual ID of the canvas element
        canvas.style.backgroundColor = color;
    }
</script>
<script>
    function changeColor3(event) {
        var color = event.value;
        var canvas = document.getElementById('square3'); // Change 'square' to the actual ID of the canvas element
        canvas.style.backgroundColor = color;
    }
</script>
<script>
    function changeColor4(event) {
        var color = event.value;
        var canvas = document.getElementById('square4'); // Change 'square' to the actual ID of the canvas element
        canvas.style.backgroundColor = color;
    }
</script>

<script>
    // Get all canvas elements
    const canvasElements = document.querySelectorAll('canvas');

    // Loop through each canvas element and set the background color
    canvasElements.forEach(canvas => {
        const colorCode = canvas.getAttribute('data-color');
        canvas.style.backgroundColor = colorCode;
    });
</script>

<script>
    function isMobileViews() {
        return window.innerWidth <= 767;
    }

    function loadViews() {
        if (isMobileDevice()) {
            document.querySelector('.desktop-view').computedStyleMap.display = "none";
            document.querySelector('.mobile-view').computedStyleMap.display = "block";
        } else {
            document.querySelector('.mobile-view').computedStyleMap.display = "none";
            document.querySelector('.desktop-view').computedStyleMap.display = "block";
        }
    }

    loadViews();
</script>

<!doctype html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.auth-head')

<body>
    @include('layouts.partials.preloader')
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.partials.header')
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        @if (Auth::check())
                            @if (Auth::user()->role == 'Super Administrator')
                                <li class="sidebar-item pt-2">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('home') }}" aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('profile') }}" aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('entry.create') }}" aria-expanded="false">
                                        <i class="fa fa-font" aria-hidden="true"></i>
                                        <span class="hide-menu">Create Entry</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('entry.index') }}" aria-expanded="false">
                                        <i class="fa fa-font" aria-hidden="true"></i>
                                        <span class="hide-menu">View Entries</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('users') }}" aria-expanded="false">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">Users List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('logout') }}" aria-expanded="false" onclick="logout()"">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">Logout</span>
                                    </a>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('engineer.index') }}" aria-expanded="false">
                                        <i class="fa fa-table" aria-hidden="true"></i>
                                        <span class="hide-menu">Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('engineer.create') }}" aria-expanded="false">
                                        <i class="fa fa-font" aria-hidden="true"></i>
                                        <span class="hide-menu">Create Entry</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('engineer.index') }}" aria-expanded="false">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">View Entries</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('profile') }}" aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('users') }}" aria-expanded="false">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">Users List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('logout') }}" aria-expanded="false" onclick="logout()">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">Logout</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        @yield('content')
    </div>
    @include('layouts.partials.auth-script')
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
</body>

</html>

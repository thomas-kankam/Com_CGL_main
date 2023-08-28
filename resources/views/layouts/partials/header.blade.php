<header class="topbar" data-navbarbg="skin5">
    <style>

    #respond{
        width:50%;
    }
    @media screen and (min-width:768px) and (max-width: 913px) {
    #respond{
        width:22%;
      }
    }
    </style>
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href=""{{ route('dashboard') }}>
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img id="respond" src="{{ asset('assets/plugins/images/comsys.png') }}" />
                </b>
                <!--End Logo icon -->
                <!--
                <span class="logo-text">
                    dark Logo text
                    <img src="../plugins/images/logo-text.png" alt="homepage" />
                </span>
                -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="#" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li> --}}
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li>
                    <a class="profile-pic" href="#">
                        <img src="{{ asset('assets/plugins/images/users/man-i.png') }}" width="36"
                            class="img-circle"><span class="text-white font-medium">{{ Auth::user()->name }}</span></a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>

    @extends('layouts.auth')

    @section('content')
        <div class="page-wrapper"
            style="background-image: url('assets/plugins/images/compressednetworkimg.jpg'); background-size:cover;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                        <h4 class="page-title">Users List</h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>{{ session('success') }}</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Users List</h3>

                            @if (Auth::user()->role == 'Super Administrator')
                                <div class="container-login100-form-btn flex-col-c mb-3">
                                    <a href="{{ route('show-user') }}" class="btn btn-secondary add-btn">
                                        CREATE USER
                                    </a>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table no-wrap table-striped mx-auto" id="example">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 d-none d-sm-table-cell">#</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0 d-none d-sm-table-cell">Email</th>
                                            <th class="border-top-0 d-none d-sm-table-cell">Role</th>
                                            <th class="border-top-0">Contact</th>
                                            <th class="border-top-0 d-none d-sm-table-cell">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="id d-none d-sm-table-cell" scope="row">{{ $user->id }}
                                                </td>
                                                <td class="name">{{ $user->name }}</td>
                                                <td class="email d-none d-sm-table-cell">{{ $user->email }}</td>
                                                <td class="role d-none d-sm-table-cell">{{ $user->role }}</td>
                                                <td class="contact">{{ $user->contact }}</td>
                                                <td class="date d-none d-sm-table-cell">{{ $user->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

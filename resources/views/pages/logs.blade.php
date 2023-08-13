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
                    <h4 class="page-title">Activity Logs</h4>
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
                        <h3 class="box-title">Logs</h3>
                        <div class="table-responsive justify-content-center">
                            <table class="table no-wrap table-striped mx-auto" id="example">
                                <thead>
                                    <tr>
                                        <th class="d-none d-sm-table-cell">#</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <td class="d-none d-sm-table-cell">Location</th>
                                        <th class="d-none d-sm-table-cell">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td class="d-none d-sm-table-cell">{{ $log->id }}</td>
                                            <td>{{ $log->email }}</td>
                                            <td>{{ $log->message }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $log->location }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $log->created_at }}</td>
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

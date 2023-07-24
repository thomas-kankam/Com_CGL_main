@extends('layouts.auth')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Basic Table</h4>
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Basic Table</h3>
                        <p class="text-muted">Add class <code>.table</code></p>
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Change Type</th>
                                        <th class="border-top-0">Location</th>
                                        <th class="border-top-0">Incoming - Outgoing</th>
                                        <th class="border-top-0">Engineer Email</th>
                                        <th class="border-top-0">Time</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entities as $entity)
                                        <tr>
                                            <td class="id">{{ $entity->id }}</td>
                                            <td class="txt-oflo">{{ $entity->action }}</td>
                                            <td>{{ $entity->location }}</td>
                                            <td class="txt-oflo">
                                                <canvas id="square" width="20px" height="20px"> </canvas>
                                                <canvas id="square2" width="20px" height="20px"> </canvas>
                                                <canvas id="square3" width="20px" height="20px"> </canvas>
                                                <canvas id="square4" width="20px" height="20px"> </canvas>
                                            </td>
                                            <td><span class="text">{{ $entity->email }}</span></td>
                                            <td><span class="text-success">{{ $entity->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td><a href="view-entry"><button class="btn-info">View</button></a>
                                                <a href="delete-entry"><button class="btn-danger">Delete</button> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="button_under">
                                <button class="btn-rounded btn-success text-white"><a href="/create"
                                        class="text-white">Create</a></button>
                                <button class="btn-rounded btn-info text-white"><a href="/entity-view/"
                                        class="text-white">View</a></button>
                                <button class="btn-rounded btn-danger text-white"><a href="/create"
                                        class="text-white">Delete</a></button>
                                <button class="btn-rounded btn-success text-white"><a href="/create"
                                        class="text-white">Update</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.auth')

@section('content')
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Welcome, {{ Auth::user()->name }}
                    </h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Three charts -->
            <!-- ============================================================== -->
            <div class="row justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Users</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-success">{{ $users }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Changes (Monthly)</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash2"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-purple">{{ $monthlyCount }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Changes Today</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash3"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-info">{{ $dailyCount }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- MAP STATS -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Map</h3>
                        I need to put map stats here
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- RECENT CHANGES -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Recent Changes</h3>
                            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                <select class="form-select shadow-none row border-top">
                                    <option>
                                        <script>
                                            var d = new Date();

                                            var date = d.getDate();
                                            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
                                            var year = d.getFullYear();
                                            var dateStr = date + "/" + month + "/" + year;
                                            document.write(dateStr);
                                        </script>
                                    </option>
                                </select>
                            </div>
                        </div>
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
                                        {{-- <tr>
                                            <td class="id">{{ $user->id }}</td>
                                            <td class="name">{{ $user->name }}</td>
                                            <td class="email">{{ $user->email }}</td>
                                            <td class="role">{{ $user->role }}</td>
                                            <td class="contact">{{ $user->contact }}</td>
                                            <td class="job">{{ $user->job }}</td>
                                        </tr> --}}

                                        <tr>
                                            <td class="id">{{ $entity->id }}</td>
                                            <td class="txt-oflo">{{ $entity->action }}</td>
                                            <td>{{ $entity->location }}</td>
                                            <td class="txt-oflo">
                                                <canvas id="square" width="20px" height="20px">
                                                    {{ $entity->incoming_buffer }}</canvas>
                                                <canvas id="square2" width="20px"
                                                    height="20px">{{ $entity->incoming_core }}
                                                </canvas>
                                                <canvas id="square3" width="20px"
                                                    height="20px">{{ $entity->outgoing_buffer }} </canvas>
                                                <canvas id="square4" width="20px" height="20px">
                                                    {{ $entity->outgoing_core }}</canvas>
                                            </td>
                                            <td><span class="text">{{ $entity->email }}</span></td>
                                            <td><span
                                                    class="text-success">{{ $entity->created_at->diffForHumans() }}</span>
                                            </td>
                                            {{-- <td><a href="{{ route('view-entity', $entity->id) }}"><button
                                                        class="btn-info">View</button></a> --}}
                                            <a href="delete-entry"><button class="btn-danger">Delete</button> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent Comments -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- .col -->
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">Recent Comments</h3>
                        </div>
                        {{-- <div class="comment-widgets">
                            <!-- Comment Row -->
                            @foreach ($entries as $comment)
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><img src="../plugins/images/users/ritesh.jpg" alt="user"
                                            width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium">{{ $comment->user->email }}</h5>
                                        <span class="mb-3 d-block">{{ $comment->other }}</span>
                                        <div class="comment-footer d-md-flex align-items-center">
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">
                                                {{ $entry->created_at->format('F d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2023 © Made with <span>&#10084;</span>, Comsys Ghana Limited by <a
                href="#">KW</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

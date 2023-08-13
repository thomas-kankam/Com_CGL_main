@extends('layouts.auth')

@section('content')
    <!-- ============================================================== -->
    <div class="page-wrapper"
        style="background-image: url('assets/plugins/images/compressednetworkimg.jpg'); background-size:cover;">
        <!-- ============================================================== -->
        <!-- BREADCRUMB PLACE -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                    <h4 class="page-title">View All Entries</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- BREADCRUMB PLACE - END -->
        <!-- ============================================================== -->
        <section id="desktop-view">
            <div class="container-fluid" style="padding-right:0px; padding-left:0px;">
                <!-- ============================================================== -->
                <!-- RECENT CHANGES -->
                <!-- ============================================================== -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>{{ session('success') }}</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All Entries</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap" id="example">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Change Type</th>
                                            <th class="border-top-0">Location</th>
                                            <th class="border-top-0">Incoming-Location</th>
                                            <th class="border-top-0">Incoming(B/C) - (C/B)Outgoing</th>
                                            <th class="border-top-0">Outgoing-Location</th>
                                            <th class="border-top-0">Engineer Email</th>
                                            <th class="border-top-0">Time</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entries as $entry)
                                            <tr>
                                                <td class="id d-none d-sm-table-cell">{{ $entry->id }}</td>
                                                <td class="txt-oflo">{{ $entry->action }}</td>
                                                <td>{{ $entry->location }}</td>
                                                <td>{{ $entry->incoming_cable }}</td>
                                                <td class="txt-oflo">
                                                    <canvas id="square" width="20px" height="20px"
                                                        data-color="{{ $entry->incoming_buffer }}" class="m-l-40"></canvas>
                                                    <canvas id="square2" width="20px" height="20px"
                                                        data-color="{{ $entry->incoming_core }}">
                                                    </canvas>
                                                    <canvas id="square4" width="20px" height="20px"
                                                        data-color="{{ $entry->outgoing_core }}" class="m-l-40"></canvas>
                                                    <canvas id="square3" width="20px" height="20px"
                                                        data-color="{{ $entry->outgoing_buffer }}">
                                                    </canvas>
                                                </td>
                                                <td>{{ $entry->outgoing_cable }}</td>
                                                <td class="d-none d-sm-table-cell"><span
                                                        class="text">{{ $entry->user_email }}</span></td>
                                                <td class="d-none d-sm-table-cell"><span
                                                        class="text-success">{{ $entry->created_at->diffForHumans() }}</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    @if (Auth::user()->role == 'Super Administrator')
                                                        <a href="{{ route('entry.edit', $entry->id) }}"><button
                                                                class="btn-info">Edit</button></a>
                                                        <button class="btn-danger" data-toggle="modal"
                                                            data-target="#deleteModal"
                                                            onclick="handleDelete({{ $entry->id }})">Delete</button>
                                                    @elseif (Auth::user()->id == $entry->user_id)
                                                        <a href="{{ route('entry.edit', $entry->id) }}"><button
                                                                class="btn-info">Edit</button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="mobile-view">
            <div class="container-fluid mt-2" style=" padding-right: 0px; padding-left: 0px;">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>{{ session('success') }}</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 col-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Entries Details
                                </h5>

                                <p class="card-text">
                                    <b>Location: <span id="selectedLocation">{{ $entry->location }}</span></b><br>
                                    <b>Cable Type Incoming: <span
                                            id="selectedIncomingCableType">{{ $entry->incoming_cable_type }}</span></b><br>
                                    <b>Cable Type Outgoing: <span
                                            id="selectedOutgoingCableType">{{ $entry->outgoing_cable_type }}</span></b><br>
                                    <b>Longitude: <span id="selectedLongitude">{{ $entry->longitude }}</span></b><br>
                                    <b>Latitude: <span id="selectedLatitude">{{ $entry->latitude }}</span></b><br>
                                    <b>Eng. Email: <span id="selectedEmail">{{ $entry->user_email }}</span></b><br>
                                    <b>Change Date/Time: <span
                                            id="selectedUpdatedTime">{{ $entry->updated_at->diffForHumans() }}</span></b><br>
                                </p>

                                <table class="table no-wrap col-3" id="example">
                                    <thead class="bg-danger text-white" style="width: 200px;">
                                        <tr>
                                            <th>Incoming Location</th>
                                            <th id="specwidth3"> B|C - C|B </th>
                                            <th class="specialincOut no-wrap">Outgoing Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="selectedCanvas1" class="text-center">{{ $entry->incoming_cable }}
                                            </td>
                                            <td class="txt-oflo">
                                                <canvas id="selectedCanvas2" width="12px" height="12px"
                                                    style="margin-left: 5px;"
                                                    data-color="{{ $entry->incoming_buffer }}"></canvas>
                                                <canvas id="selectedCanvas3" width="12px" height="12px"
                                                    style="
                                                    data-color="{{ $entry->incoming_core }}">
                                                </canvas>

                                                <canvas id="selectedCanvas4" width="12px" height="12px"
                                                    style="margin-left: 5px;"
                                                    data-color="{{ $entry->outgoing_core }}"></canvas>
                                                <canvas id="selectedCanvas5" width="12px" height="12px"
                                                    style="
                                                    data-color="{{ $entry->outgoing_buffer }}">
                                                </canvas>
                                            </td>
                                            <td id="selectedCanvas6" class="text-center" style="margin-left:px;">
                                                {{ $entry->outgoing_cable }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <button class="button4 btn btn-info col-3">Edit</button>
                                <button class="button5 btn btn-danger col-3 ">Delete</button>
                            </div>
                            <div class="card-body">

                            </div>
                        </div> --}}
                    </div>
                </div>
                <!--Table for all the  Entries Start -->
                <div class="container">
                    <div class="card mb-3">
                        <h2>All entries</h2>
                        <div class="table-responsive table-container mb-3">
                            <table class="table no-wrap" id="example">
                                <thead class="bg-danger text-white" style="width: 200px;">
                                    <tr>
                                        <th>#</th>
                                        <th>Location</th>
                                        <th class="specialincOut no-wrap" id="specwidth2">In(B/C) - (C/B)Out</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $entry)
                                        <tr class="entry-row" data-entry="{{ $entry }}">
                                            <td>{{ $entry->id }}</td>
                                            <td id="againspecwidth">{{ $entry->location }}</td>
                                            <td class="txt-oflo">
                                                <canvas id="square" width="20px" height="20px"
                                                    style="margin-left: 10px;"
                                                    data-color="{{ $entry->incoming_buffer }}"></canvas>
                                                <canvas id="square2" width="20px" height="20px"
                                                    style="
                                                    data-color="{{ $entry->incoming_core }}">
                                                </canvas>
                                                <canvas id="square4" width="20px" height="20px"
                                                    style="margin-left: 15px;"
                                                    data-color="{{ $entry->outgoing_core }}"></canvas>
                                                <canvas id="square3" width="20px" height="20px"
                                                    style="
                                                    data-color="{{ $entry->outgoing_buffer }}">
                                                </canvas>
                                            </td>
                                            <td class="text-success" style="margin-left:30px;">
                                                {{ $entry->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Danger Header Modal -->
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')

                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-hidden="true"></button>
                        </div>

                        <div class="modal-body">
                            <p class="text-bold">
                                Are you sure you want to delete this record ?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".entry-row").click(function() {
                var entry = JSON.parse($(this).attr("data-entry"));

                // Update top card details
                $("#selectedLocation").text(entry.location);
                $("#selectedIncomingCableType").text(entry.incoming_cable_type);
                $("#selectedOutgoingCableType").text(entry.outgoing_cable_type);
                $("#selectedLongitude").text(entry.longitude);
                $("#selectedLatitude").text(entry.latitude);
                $("#selectedEmail").text(entry.user_email);
                $("#selectedUpdatedTime").text(entry.updated_at);

                // Update top card table
                var selectedCanvas1 = document.getElementById("selectedCanvas1");
                selectedCanvas1 = entry.incoming_buffer;

                var selectedCanvas2 = document.getElementById("selectedCanvas2");
                selectedCanvas2.style.backgroundColor = entry.incoming_core;

                var selectedCanvas3 = document.getElementById("selectedCanvas3");
                selectedCanvas3.style.backgroundColor = entry.incoming_core;

                var selectedCanvas4 = document.getElementById("selectedCanvas4");
                selectedCanvas4.style.backgroundColor = entry.outgoing_core;

                var selectedCanvas5 = document.getElementById("selectedCanvas5");
                selectedCanvas5.style.backgroundColor = entry.outgoing_buffer;

                var selectedCanvas6 = document.getElementById("selectedCanvas6");
                selectedCanvas6 = entry.outgoing_core;
            });
        });
    </script>
@endsection

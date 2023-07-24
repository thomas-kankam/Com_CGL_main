@extends('layouts.auth')

@section('content')
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- RECENT CHANGES -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">All Entries</h3>
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
                            <table class="table no-wrap" id="example">
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
                                            <td><span class="text-success">{{ $entity->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td><a href="{{ route('view-entity', $entity->id) }}"><button
                                                        class="btn-info">View</button></a>
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
        </div>
    </div>
@endsection

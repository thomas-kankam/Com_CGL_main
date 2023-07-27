@extends('layouts.auth')

@section('content')
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
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
                                    @foreach ($entries as $entry)
                                        <tr>
                                            <td class="id">{{ $entry->id }}</td>
                                            <td class="txt-oflo">{{ $entry->action }}</td>
                                            <td>{{ $entry->location }}</td>
                                            <td class="txt-oflo">
                                                <canvas id="square" width="20px" height="20px">
                                                    {{ $entry->incoming_buffer }}</canvas>
                                                <canvas id="square2" width="20px"
                                                    height="20px">{{ $entry->incoming_core }}
                                                </canvas>
                                                <canvas id="square3" width="20px"
                                                    height="20px">{{ $entry->outgoing_buffer }} </canvas>
                                                <canvas id="square4" width="20px" height="20px">
                                                    {{ $entry->outgoing_core }}</canvas>
                                            </td>
                                            <td><span class="text">{{ $entry->user_email }}</span></td>
                                            <td><span class="text-success">{{ $entry->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td><a href="{{ route('entry.edit', $entry->id) }}"><button
                                                        class="btn-info">Edit</button></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal" onclick="handleDelete({{ $entry->id }})">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteCategoryForm">
                        @csrf
                        @method('DELETE')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <p class="text-bold">
                                    Are you sure you want to delete this record ?
                                </p>
                            </div>

                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button> --}}
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

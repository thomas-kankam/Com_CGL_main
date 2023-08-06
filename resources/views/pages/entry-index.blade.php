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
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap" id="example">
                                <thead>
                                    <tr>
                                        {{-- <th class="border-top-0">#</th> --}}
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
                                            {{-- <td class="id">{{ $entry->id }}</td> --}}
                                            <td class="txt-oflo">{{ $entry->action }}</td>
                                            <td>{{ $entry->location }}</td>
                                            <td>{{ $entry->incoming_cable }}</td>
                                            <td class="txt-oflo">
                                                <canvas id="square" width="20px" height="20px"
                                                    data-color="{{ $entry->incoming_buffer }}" class="m-l-40"></canvas>
                                                <canvas id="square2" width="20px" height="20px"
                                                    data-color="{{ $entry->incoming_core }}">
                                                </canvas>
                                                <canvas id="square3" width="20px" height="20px"
                                                    data-color="{{ $entry->outgoing_buffer }}" class="m-l-40"></canvas>
                                                <canvas id="square4" width="20px" height="20px"
                                                    data-color="{{ $entry->outgoing_core }}">
                                                </canvas>
                                            </td>
                                            <td>{{ $entry->outgoing_cable }}</td>
                                            <td><span class="text">{{ $entry->user_email }}</span></td>
                                            <td><span class="text-success">{{ $entry->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td>
                                                @if (Auth::user()->role == 'Super Administrator')
                                                    <a href="{{ route('entry.edit', $entry->id) }}"><button
                                                            class="btn-info">Edit</button></a>
                                                    <a href="{{ route('entry.destroy', $entry->id) }}"><button
                                                            class="btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#danger-header-modal"
                                                            onclick="event.preventDefault();">Delete</button></a>
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

            <!-- Danger Header Modal -->
            <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    @foreach ($entries as $entry)
                        <form action="{{ route('entry.destroy', $entry->id) }}" method="POST" id="deleteCategoryForm">
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
                    @endforeach
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
@endsection

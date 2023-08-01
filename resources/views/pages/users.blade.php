    @extends('layouts.auth')

    @section('content')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
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
                            @if (Auth::check())
                                @if (Auth::user()->role == 'Super Administrator')
                                    <div class="container-login100-form-btn flex-col-c mb-3">

                                        <a href="{{ route('show-user') }}" class="btn btn-secondary add-btn">
                                            CREATE USER
                                        </a>
                                    </div>
                                @endif
                            @endif
                            <div class="table-responsive">
                                <table class="table no-wrap table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Contact</th>
                                            <th class="border-top-0">Job</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="id" scope="row">{{ $user->id }}</td>
                                                <td class="name">{{ $user->name }}</td>
                                                <td class="email">{{ $user->email }}</td>
                                                <td class="role">{{ $user->role }}</td>
                                                <td class="contact">{{ $user->contact }}</td>
                                                <td class="job">{{ $user->job }}</td>
                                                <td>
                                                    @if (Auth::user()->role == 'Super Administrator')
                                                        <a href="{{ route('entry.edit', $user->id) }}"><button
                                                                class="btn-info">Edit</button></a>
                                                        <a href="{{ route('entry.delete', $user->id) }}"><button
                                                                class="btn-danger">Delete</button></a>
                                                    @elseif (Auth::user()->id == $user->user_id)
                                                        <a href="{{ route('entry.edit', $user->id) }}"><button
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

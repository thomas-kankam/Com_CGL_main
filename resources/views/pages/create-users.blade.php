@extends('layouts.auth')

@section('content')
    <div class="page-wrapper" style="background-image: url('assets/plugins/images/compressednetworkimg.jpg'); background-size:cover;">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Create Users</h4>
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
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="validate-form p-l-5 p-r-5" autocomplete="on" method="POST"
                                action="{{ route('create-user') }}">
                                @csrf
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter username here" name="name" value="{{ old('name') }}"
                                        autocomplete="username" autofocus required />
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter email here" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus />
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Select Role Type</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0" name="role" id="role"
                                            aria-label="Role" value="{{ old('role') }}">
                                            <option selected disabled>Select One</option>
                                            <option value="Super Administrator">Super Administrator</option>
                                            <option value="Engineer">Engineer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        name="password" autocomplete="password" placeholder="Enter password" required />
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        name="password_confirmation" autocomplete="password" placeholder="Confirm password"
                                        required />
                                </div>
                                <div class="container-login100-form-btn flex-col-c">
                                    <button type="submit" class="btn btn-secondary add-btn">Save User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

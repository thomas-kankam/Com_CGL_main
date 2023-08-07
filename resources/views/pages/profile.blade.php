@extends('layouts.auth')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Profile page</h4>
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
            <!-- Row -->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b>{{ session('success') }}</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-12">
                    <div class="white-box">
                        <div class="user-bg"> <img width="100%" alt="user"
                                src="{{ asset('assets/plugins/images/large/img1.jpg') }}">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <a href="javascript:void(0)"><img
                                            src="{{ asset('assets/plugins/images/users/user-i.png') }}"
                                            class="thumb-lg img-circle" alt="img"></a>
                                    <h4 class="text-white mt-2">{{ Auth::user()->name }}</h4>
                                    <h5 class="text-white mt-2">{{ Auth::user()->email }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="user-btm-box mt-5 d-md-flex">
                            <div class="col-md-12 col-sm-12 text-center">
                                <h5>Job Role: {{ Auth::user()->job }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-horizontal form-material" autocomplete="on" method="POST"
                                action="{{ route('profile.update', auth()->id()) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Full Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0"
                                            value="{{ auth()->user()->name }}" name="name" autofocus="" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Email</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="email" class="form-control p-0 border-0" name="email"
                                            id="example-email" value="{{ auth()->user()->email }}"
                                            placeholder="john.doe@example.com">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Phone No</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0"
                                            value="{{ auth()->user()->contact }}" name="contact" autofocus>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Description</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="3" class="form-control p-0 border-0" name="description" autofocus>{{ auth()->user()->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Select Job Role</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line"
                                            name="job" id="job" aria-label="Job">
                                            <option selected disabled>Select One</option>
                                            <option value="Chief Technical Officer">Chief Technical Officer</option>
                                            <option value="Network Engineer">Network Engineer</option>
                                        </select>
                                        {{-- <input type="text" class="form-control p-0 border-0"
                                            value="{{ auth()->user()->job }}"> --}}
                                    </div>
                                </div>

                                {{-- <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Profile Image:</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" name="profile_image" class="border-0"
                                            value="{{ auth()->user()->profile_image }}">
                                    </div>
                                </div> --}}

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-danger text-white">Update Profile</button>
                                        <a type="submit" class="btn btn-danger text-white"
                                            href="{{ route('changePassword') }}">Change Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
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

@extends('layouts.auth')

@section('content')
    <div class="page-wrapper" style="background-image: url('assets/plugins/images/compressednetworkimg.jpg'); background-size:cover;">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Change Password</h4>
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid bg-white">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif


            <div class="row ">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            {{-- <label for="new-password" class="col-md-4 control-label">Current Password</label> --}}
                            <label for="current-password" class="form-label">Current Password<span
                                    class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="current-password" type="password" class="form-control" name="current-password"
                                    required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            {{-- <label for="new-password" class="col-md-4 control-label">New Password</label> --}}
                            <label for="new-password" class="form-label">New Password<span
                                    class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                {{-- @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label> --}}
                            <label for="new-password-confirm" class="form-label">Confirm New Password<span
                                    class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="new-password-confirm" type="password" class="form-control"
                                    name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-primary" id="add-btn">Change Password</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

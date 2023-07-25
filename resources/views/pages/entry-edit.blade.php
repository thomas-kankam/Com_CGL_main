@extends('layouts.auth')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">View</h4>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Selection </h4>
                            <h6 class="card-subtitle">View actions : <code> Core change, New establishment, etc </code></h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class=" validate-form p-l-5 p-r-5 " autocomplete="on" method="POST"
                                action="{{ route('entry.update', $entry->id) }}">
                                @csrf
                                @method('PUT')
                                <span class="login100-form-title text-white p-b-9">
                                    VIEW
                                </span>
                                <fieldset>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Action Selected</label>
                                        <input type="text" id="disabledTextInput" name="action"
                                            value="{{ $entry->action }}" class="form-control" placeholder="Disabled input">
                                    </div>

                                    <div class="wrap-input100 mb-3">
                                        <label for="disabledTextInput" class="form-label">Other</label>
                                        <input type="text" name="location" value="{{ $entry->other }}"
                                            class="form-control" id="disabledTextInput" placeholder="Current Location">
                                    </div>

                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Location</label>
                                        <input type="text" name="location" value="{{ $entry->location }}"
                                            class="form-control" id="disabledTextInput" placeholder="Current Location">
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Incoming cable</label>
                                        <input type="text" name="incoming_cable" value="{{ $entry->incoming_cable }}"
                                            class="form-control" id="disabledTextInput" placeholder="Cable location">
                                    </div>

                                    <div class="row g-3 align-items-center m-t-">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" name="incoming_buffer"
                                                value="{{ $entry->incoming_buffer }}" class="form-control"
                                                id="bufferIncoming" placeholder='Red'>
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square" width="30px" height="30px"></canvas>
                                            </span>
                                        </div>
                                        <div class="col-auto col-auto-c m-l-200">
                                            <label for="inputPassword6" class="col-form-label">Core :</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="coreincoming"
                                                value="{{ $entry->incoming_core }}" name=incoming_core"
                                                placeholder="Violet">
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square2" width="30px" height="30px"> </canvas>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="wrap-input100 mb-3 m-t-40">
                                        <label for="exampleFormControlInput1" class="form-label">Outgoing cable</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name=outgoing_cable" placeholder="Cable location"
                                            value="{{ $entry->outgoing_cable }}">
                                    </div>
                                    <div class="row g-3 align-items-center m-t-2">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label ">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="bufferoutgoing"
                                                name=outgoing_buffer" placeholder="Brown"
                                                value="{{ $entry->outgoing_buffer }}">
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square3" width="30px" height="30px"> </canvas>
                                            </span>
                                        </div>
                                        <div class="col-auto col-auto-c m-l-200">
                                            <label for="inputPassword6" class="col-form-label">Core :</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="coreoutgoing"
                                                name="outgoing_core" placeholder="Aqua"
                                                value="{{ $entry->outgoing_core }}">
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square4" width="30px" height="30px"> </canvas>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 m-t-20">
                                        <label for="exampleInputEmail1" class="form-label">Engineer Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $entry->user_email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Time</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            value="{{ $entry->created_at }}">
                                    </div>
                                </fieldset disabled>
                                <div class="container-login100-form-btn flex-col-c">
                                    <button type="submit" class="btn btn-secondary add-btn">Edit Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

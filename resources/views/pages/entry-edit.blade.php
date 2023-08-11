@extends('layouts.auth')

@section('content')
    <div class="page-wrapper" style="background-image: url('assets/plugins/images/compressednetworkimg.jpg'); background-size:cover;">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                    <h4 class="page-title">Edit Entries</h4>
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
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b>{{ session('success') }}</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class=" validate-form p-l-5 p-r-5 " autocomplete="on" method="POST"
                                action="{{ route('entry.update', $entry->id) }}">
                                @csrf
                                @method('PUT')
                                <span class="login100-form-title text-white p-b-9">
                                    VIEW
                                </span>
                                <fieldset>
                                    {{-- <div class="mb-3">
                                        <label for="action" class="form-label">Action Selected</label>
                                        <input type="text" id="action" name="action" value="{{ $entry->action }}"
                                            class="form-control" placeholder="Disabled input">
                                    </div> --}}

                                    <div class="input-group mb-3 m-t-40">
                                        <label class="input-group-text" for="inputGroupSelect01">Action Selected</label>
                                        <select class="form-select" id="inputGroupSelect01" name="action">
                                            {{-- <option selected disabled>Select Action</option> --}}
                                            <option value="New Core" @if ($entry->action === 'New Core') selected @endif>New
                                                Core</option>
                                            <option value="Core Change" @if ($entry->action === 'Core Change') selected @endif>
                                                Core Change</option>
                                        </select>
                                    </div>

                                    <div class="wrap-input100 mb-3">
                                        <label for="other" class="form-label">Other</label>
                                        <input type="text" name="other" value="{{ $entry->other }}"
                                            class="form-control" id="other" placeholder="Current Location">
                                    </div>

                                    <div class="wrap-input100 mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" name="location" value="{{ $entry->location }}"
                                            class="form-control" id="location" placeholder="Current Location">
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="longitude" class="col-form-label">Longitude:</label>
                                        </div>
                                        <div class="col-auto" style="margin-left: 7px">
                                            <input type="text" id="longitude" class="form-control"
                                                aria-describedby="passwordHelpInline" name="longitude"
                                                value="{{ $entry->longitude }}">
                                        </div>
                                        <div class="col-auto">
                                            <label for="latitude" class="col-form-label">Latitude :</label>
                                        </div>
                                        <div class="col-auto" style="margin-left: 14px">
                                            <input type="text" id="latitude" name="latitude" class="form-control"
                                                value="{{ $entry->latitude }}" aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="incoming_cable" class="form-label">Incoming cable</label>
                                        <input type="text" name="incoming_cable" value="{{ $entry->incoming_cable }}"
                                            class="form-control" id="incoming_cable" placeholder="Cable location">
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cable Type</label>
                                        <input type="text" name="incoming_cable_type" class="form-control"
                                            value="{{ $entry->incoming_cable_type }}" id="exampleFormControlInput1"
                                            placeholder="Cable Type">
                                    </div>
                                    <div class="row g-3 align-items-center m-t-">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select" id="inputPassword6" onchange="changeColor(this)"
                                                name="incoming_buffer">
                                                <option value="Blue" @if ($entry->incoming_buffer === 'Blue') selected @endif>
                                                    Blue</option>
                                                <option value="Orange" @if ($entry->incoming_buffer === 'Orange') selected @endif>
                                                    Orange</option>
                                                <!-- Add other options as required -->
                                                <!-- Add other options as required Blue, Orange, Green, Brown, #0CC2C9, White, Red, Black, Yellow, Aqua, #FF007F, #8F00FF-->
                                                <option value="Green" @if ($entry->incoming_buffer === 'Green') selected @endif>
                                                    Green</option>
                                                <option value="Brown" @if ($entry->incoming_buffer === 'Brown') selected @endif>
                                                    Brown</option>
                                                <option value="#C0C2C9" @if ($entry->incoming_buffer === '#C0C2C9') selected @endif>
                                                    Slate</option>
                                                <option value="White" @if ($entry->incoming_buffer === 'White') selected @endif>
                                                    White</option>
                                                <option value="Red" @if ($entry->incoming_buffer === 'Red') selected @endif>
                                                    Red</option>
                                                <option value="Black" @if ($entry->incoming_buffer === 'Black') selected @endif>
                                                    Black</option>
                                                <option value="Yellow" @if ($entry->incoming_buffer === 'Yellow') selected @endif>
                                                    Yellow</option>
                                                <option value="Violet" @if ($entry->incoming_buffer === 'Violet') selected @endif>
                                                    Violet</option>
                                                <option value="#FF007F"
                                                    @if ($entry->incoming_buffer === '#FF007F') selected @endif>
                                                    Rose</option>
                                                <option value="Aqua" @if ($entry->incoming_buffer === 'Aqua') selected @endif>
                                                    Aqua</option>
                                            </select>
                                        </div>

                                        <!-- For incoming_buffer -->
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text" style="margin-right: 50px;">
                                                <canvas id="square" data-color="{{ $entry->incoming_buffer }}"
                                                    width="30px" height="30px"></canvas>
                                            </span>
                                        </div>
                                        <div class="col-auto col-auto-c m-l-200">
                                            <label for="inputPassword6" class="col-form-label">Core :</label>
                                        </div>
                                        <div class="col-auto">
                                            <div class="col-auto">
                                                <select class="form-select" id="inputPassword6"
                                                    onchange="changeColor2(this)" name="incoming_core" style="margin-right: 10px">
                                                    <option value="Blue"
                                                        @if ($entry->incoming_core === 'Blue') selected @endif>
                                                        Blue</option>
                                                    <option value="Orange"
                                                        @if ($entry->incoming_core === 'Orange') selected @endif>
                                                        Orange</option>
                                                    <!-- Add other options as required -->
                                                    <!-- Add other options as required Blue, Orange, Green, Brown, #0CC2C9, White, Red, Black, Yellow, Aqua, #FF007F, #8F00FF-->
                                                    <option value="Green"
                                                        @if ($entry->incoming_core === 'Green') selected @endif>
                                                        Green</option>
                                                    <option value="Brown"
                                                        @if ($entry->incoming_core === 'Brown') selected @endif>
                                                        Brown</option>
                                                    <option value="#C0C2C9"
                                                        @if ($entry->incoming_core === '#C0C2C9') selected @endif>
                                                        Slate</option>
                                                    <option value="White"
                                                        @if ($entry->incoming_core === 'White') selected @endif>
                                                        White</option>
                                                    <option value="Red"
                                                        @if ($entry->incoming_core === 'Red') selected @endif>
                                                        Red</option>
                                                    <option value="Black"
                                                        @if ($entry->incoming_core === 'Black') selected @endif>
                                                        Black</option>
                                                    <option value="Yellow"
                                                        @if ($entry->incoming_core === 'Yellow') selected @endif>
                                                        Yellow</option>
                                                    <option value="Violet"
                                                        @if ($entry->incoming_core === 'Violet') selected @endif>
                                                        Violet</option>
                                                    <option value="#FF007F"
                                                        @if ($entry->incoming_core === '#FF007F') selected @endif>
                                                        Rose</option>
                                                    <option value="Aqua"
                                                        @if ($entry->incoming_core === 'Aqua') selected @endif>
                                                        Aqua</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- For incoming_core -->
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square2" data-color="{{ $entry->incoming_core }}"
                                                    width="30px" height="30px"></canvas>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="wrap-input100 mb-3 m-t-40">
                                        <label for="outgoing_cable" class="form-label">Outgoing cable</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            value="{{ $entry->outgoing_cable }}" name="outgoing_cable"
                                            placeholder="Cable location">
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cable Type</label>
                                        <input type="text" name="outgoing_cable_type" class="form-control"
                                            value="{{ $entry->outgoing_cable_type }}" id="exampleFormControlInput1"
                                            placeholder="Cable type">
                                    </div>
                                    <div class="row g-3 align-items-center m-t-2">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select" id="inputPassword6" onchange="changeColor3(this)"
                                                name="outgoing_buffer">
                                                <option value="Blue" @if ($entry->outgoing_buffer === 'Blue') selected @endif>
                                                    Blue</option>
                                                <option value="Orange" @if ($entry->outgoing_buffer === 'Orange') selected @endif>
                                                    Orange</option>
                                                <!-- Add other options as required -->
                                                <!-- Add other options as required Blue, Orange, Green, Brown, #0CC2C9, White, Red, Black, Yellow, Aqua, #FF007F, #8F00FF-->
                                                <option value="Green" @if ($entry->outgoing_buffer === 'Green') selected @endif>
                                                    Green</option>
                                                <option value="Brown" @if ($entry->outgoing_buffer === 'Brown') selected @endif>
                                                    Brown</option>
                                                <option value="#C0C2C9"
                                                    @if ($entry->outgoing_buffer === '#C0C2C9') selected @endif>
                                                    Slate</option>
                                                <option value="White" @if ($entry->outgoing_buffer === 'White') selected @endif>
                                                    White</option>
                                                <option value="Red" @if ($entry->outgoing_buffer === 'Red') selected @endif>
                                                    Red</option>
                                                <option value="Black" @if ($entry->outgoing_buffer === 'Black') selected @endif>
                                                    Black</option>
                                                <option value="Yellow" @if ($entry->outgoing_buffer === 'Yellow') selected @endif>
                                                    Yellow</option>
                                                <option value="Violet" @if ($entry->outgoing_buffer === 'Violet') selected @endif>
                                                    Violet</option>
                                                <option value="#FF007F"
                                                    @if ($entry->outgoing_buffer === '#FF007F') selected @endif>
                                                    Rose</option>
                                                <option value="Aqua" @if ($entry->outgoing_buffer === 'Aqua') selected @endif>
                                                    Aqua</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text" style="margin-right: 50px;">
                                                <canvas id="square3" data-color="{{ $entry->outgoing_buffer }}"
                                                    width="30px" height="30px"> </canvas>
                                            </span>
                                        </div>

                                        <div class="col-auto col-auto-c m-l-200" >
                                            <label for="inputPassword6" class="col-form-label">Core :</label>
                                        </div>

                                        <div class="col-auto">
                                            <select class="form-select" id="inputPassword6" onchange="changeColor4(this)"
                                                name="outgoing_core" style="margin-right: 10px">
                                                <option value="Blue" @if ($entry->outgoing_core === 'Blue') selected @endif>
                                                    Blue</option>
                                                <option value="Orange" @if ($entry->outgoing_core === 'Orange') selected @endif>
                                                    Orange</option>
                                                <!-- Add other options as required -->
                                                <!-- Add other options as required Blue, Orange, Green, Brown, #0CC2C9, White, Red, Black, Yellow, Aqua, #FF007F, #8F00FF-->
                                                <option value="Green" @if ($entry->outgoing_core === 'Green') selected @endif>
                                                    Green</option>
                                                <option value="Brown" @if ($entry->outgoing_core === 'Brown') selected @endif>
                                                    Brown</option>
                                                <option value="#C0C2C9"
                                                    @if ($entry->outgoing_core === '#C0C2C9') selected @endif>
                                                    Slate</option>
                                                <option value="White" @if ($entry->outgoing_core === 'White') selected @endif>
                                                    White</option>
                                                <option value="Red" @if ($entry->outgoing_core === 'Red') selected @endif>
                                                    Red</option>
                                                <option value="Black" @if ($entry->outgoing_core === 'Black') selected @endif>
                                                    Black</option>
                                                <option value="Yellow" @if ($entry->outgoing_core === 'Yellow') selected @endif>
                                                    Yellow</option>
                                                <option value="Violet" @if ($entry->outgoing_core === 'Violet') selected @endif>
                                                    Violet</option>
                                                <option value="#8F00FF"
                                                    @if ($entry->outgoing_core === '#8F00FF') selected @endif>
                                                    Rose</option>
                                                <option value="Aqua" @if ($entry->outgoing_core === 'Aqua') selected @endif>
                                                    Aqua</option>
                                            </select>
                                        </div>

                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square4" width="30px" height="30px"
                                                    data-color="{{ $entry->outgoing_core }}"> </canvas>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 m-t-20">
                                        <label for="user_email" class="form-label">Engineer Email</label>
                                        <input type="text" class="form-control" id="user_email"
                                            aria-describedby="emailHelp" name="user_email"
                                            value="{{ $entry->user_email }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="time" class="form-label">Time</label>
                                        <input type="text" class="form-control" id="time" name="time"
                                            value="{{ $entry->created_at }}" disabled>
                                    </div>
                                </fieldset disabled>
                                <div class="container-login100-form-btn flex-col-c">
                                    <button type="submit" class="btn btn-danger add-btn text-white">Save Edited Entry</button>
                                </div>
                                {{-- {{ dd($request->all()) }} --}}
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

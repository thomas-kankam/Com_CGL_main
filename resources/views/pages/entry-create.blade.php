    @extends('layouts.auth')

    @section('content')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Create Entry</h4>
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
                                <h4 class="card-title">Create entries here </h4>
                                <h6 class="card-subtitle">Enter new actions : <code> Core change, New establishment, etc
                                    </code>
                                </h6>
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
                                <form class="validate-form p-l-5 p-r-5 " autocomplete="on" method="POST"
                                    action="{{ route('entry.store') }}">
                                    @csrf
                                    <span class="login100-form-title text-white p-b-9">
                                        CREATE
                                    </span>

                                    <div class="input-group mb-3 m-t-40">
                                        <label class="input-group-text" for="inputGroupSelect01">Action</label>
                                        <select class="form-select" id="inputGroupSelect01" name="action">
                                            <option selected disabled>Select Action</option>
                                            <option value="New Core">New Core</option>
                                            <option value="Core Change">Core Change</option>
                                        </select>
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Other</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="other"></textarea>
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Location</label>
                                        <input type="text" name="location" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Current Location">
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        {{-- <label for="exampleFormControlInput1" class="form-label">Engineer</label> --}}
                                        <input type="text" name="user_id" class="form-control"
                                            value="{{ Auth::user()->id }}" id="exampleFormControlInput1"
                                            placeholder="Current Location" hidden>
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <input type="text" name="user_email" class="form-control"
                                            value="{{ Auth::user()->email }}" id="exampleFormControlInput1"
                                            placeholder="Current Location" hidden>
                                    </div>
                                    <div class="wrap-input100 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Incoming
                                            cable</label>
                                        <input type="text" name="incoming_cable" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Cable location">
                                    </div>
                                    <div class="row g-3 align-items-center m-t-">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select" id="select1" onchange="changeColor(this)"
                                                name="incoming_buffer">
                                                <option value="Blue" selected>Blue</option>
                                                <option value="Orange">Orange </option>
                                                <option value="Green">Green</option>
                                                <option value="Brown">Brown</option>
                                                <option value="#C0C2C9">Slate</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Black">Black</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Violet">Violet</option>
                                                <option value="#FF007F">Rose</option>
                                                <option value="Aqua">Aqua</option>
                                            </select>
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
                                            <select class="form-select" id="select2"
                                                onchange="changeColor2(this)" name="incoming_core">
                                                <option value="Blue" selected>Blue</option>
                                                <option value="Orange">Orange </option>
                                                <option value="Green">Green</option>
                                                <option value="Brown">Brown</option>
                                                <option value="#C0C2C9">Slate</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Black">Black</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Violet">Violet</option>
                                                <option value="#FF007F">Rose</option>
                                                <option value="Aqua">Aqua</option>
                                            </select>
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
                                            placeholder="Cable location" name="outgoing_cable">
                                    </div>
                                    <div class="row g-3 align-items-center m-t-2">
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label ">Buffer :</label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select" id="select3"
                                                onchange="changeColor3(this)" name="outgoing_buffer">
                                                <option value="Blue" selected>Blue</option>
                                                <option value="Orange">Orange </option>
                                                <option value="Green">Green</option>
                                                <option value="Brown">Brown</option>
                                                <option value="#C0C2C9">Slate</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Black">Black</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Violet">Violet</option>
                                                <option value="#FF007F">Rose</option>
                                                <option value="Aqua">Aqua</option>
                                            </select>
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
                                            <select class="form-select" id="select4"
                                                onchange="changeColor4(this)" name="outgoing_core">
                                                <option value="Blue">Blue</option>
                                                <option value="Orange">Orange </option>
                                                <option value="Green">Green</option>
                                                <option value="Brown">Brown</option>
                                                <option value="#C0C2C9">Slate</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Black">Black</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Violet">Violet</option>
                                                <option value="#FF007F">Rose</option>
                                                <option value="Aqua">Aqua</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <span id="passwordHelpInline" class="form-text">
                                                <canvas id="square4" width="30px" height="30px"> </canvas>
                                            </span>

                                        </div>
                                    </div>

                                    <div class="container-login100-form-btn flex-col-c pt-3">
                                        <button type="submit"  onclick="sendSelectedColors()" class="btn btn-secondary add-btn">Create Entry</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection

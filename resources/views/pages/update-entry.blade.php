@include('layouts.auth')
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
                <!--  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <div class="d-md-flex">
                                <ol class="breadcrumb ms-auto">
                                    <li><a href="#" class="fw-normal">Dashboard</a></li>
                                </ol>
                                <a href="" target="_blank"
                                    class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                    to Pro</a>
                            </div>
                        </div> -->
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
                            <h4 class="card-title">Update Existing here </h4>
                            <h6 class="card-subtitle">Enter new actions : <code> Core change, New establishment, etc </code>
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
                            <form class=" validate-form p-l-5 p-r-5 ">
                                <span class="login100-form-title text-white p-b-9">
                                    UPDATE
                                </span>
                                <div class="input-group mb-3 m-t-40">
                                    <label class="input-group-text" for="inputGroupSelect01">Action</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>Select Action</option>
                                        <option value="1">New Core </option>
                                        <option value="2">Core Change</option>
                                    </select>
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Other</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Location</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Current Location">
                                </div>
                                <div class="wrap-input100 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Incoming cable</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Cable location">
                                </div>
                                <div class="row g-3 align-items-center m-t-">
                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label">Buffer :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect01" onchange="changeColor(this)">
                                            <option value="Blue" Selected>Blue</option>
                                            <option value="Orange">Orange </option>
                                            <option value="Green">Green</option>
                                            <option value="Brown">Brown</option>
                                            <option value="#C0C2C9">Slate</option>
                                            <option value="White">White</option>
                                            <option value="Red">Red</option>
                                            <option value="Black">Black</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Violet">Voilet</option>
                                            <option value="#FF007F">Rose</option>
                                            <option value="Aqua">Aqua</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="passwordHelpInline" class="form-text">
                                            <canvas id="square" width="30px" height="30px"> </canvas>
                                        </span>
                                    </div>
                                    <div class="col-auto col-auto-c m-l-200">
                                        <label for="inputPassword6" class="col-form-label">Core :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect01" onchange="changeColor2(this)">
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
                                            <canvas id="square2" width="30px" height="30px"> </canvas>
                                        </span>

                                    </div>
                                </div>
                                <div class="wrap-input100 mb-3 m-t-40">
                                    <label for="exampleFormControlInput1" class="form-label">Outgoing cable</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Cable location">
                                </div>
                                <div class="row g-3 align-items-center m-t-2">
                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label ">Buffer :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect01"
                                            onchange="changeColor3(this)">
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
                                            <canvas id="square3" width="30px" height="30px"> </canvas>
                                        </span>
                                    </div>
                                    <div class="col-auto col-auto-c m-l-200">
                                        <label for="inputPassword6" class="col-form-label">Core :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect01"
                                            onchange="changeColor4(this)">
                                            <option value="Blue">Blue</option>4
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

                                <div class="container-login100-form-btn flex-col-c">
                                    <button class="login100-form-btn">
                                        UPDATE
                                    </button>
                                </div>

                                <div class="flex-col-c p-t-10 p-b-10">
                                    <p></p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
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

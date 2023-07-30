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
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <b>{{ session('success') }}</b>, a new Administrator created successfully
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
                        <form class=" validate-form p-l-5 p-r-5 " autocomplete="on" method="POST" action="{{ route('ing.update', $entry->id) }}">
                            @csrf
                            @method('PUT')
                            <span class="login100-form-title text-white p-b-9">
                                VIEW
                            </span>
                            <fieldset>
                                <div class="mb-3">
                                    <label for="action" class="form-label">Action Selected</label>
                                    <input type="text" id="action" name="action" value="{{ $entry->action }}" class="form-control" placeholder="Disabled input">
                                </div>

                                <div class="wrap-input100 mb-3">
                                    <label for="other" class="form-label">Other</label>
                                    <input type="text" name="other" value="{{ $entry->other }}" class="form-control" id="other" placeholder="Current Location">
                                </div>

                                <div class="wrap-input100 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" value="{{ $entry->location }}" class="form-control" id="location" placeholder="Current Location">
                                </div>
                                <div class="wrap-input100 mb-3 m-t-40">
                                    <label for="outgoing_cable" class="form-label">Outgoing cable</label>
                                    <input type="text" class="form-control" id="outgoing_cable" name="outgoing_cable" placeholder="Cable location" value="{{ $entry->outgoing_cable }}">
                                </div>

                                <div class="row g-3 align-items-center m-t-2">
                                    <div class="col-auto">
                                        <label for="outgoing_buffer" class="col-form-label ">Buffer :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect03" onchange="changeColor3(this)">
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
                                            <option value="#0CC2C9" @if ($entry->outgoing_buffer === '#0CC2C9') selected @endif>
                                                #0CC2C9</option>
                                            <option value="White" @if ($entry->outgoing_buffer === 'White') selected @endif>
                                                White</option>
                                            <option value="Red" @if ($entry->outgoing_buffer === 'Red') selected @endif>
                                                Red</option>
                                            <option value="Black" @if ($entry->outgoing_buffer === 'Black') selected @endif>
                                                Black</option>
                                            <option value="Yellow" @if ($entry->outgoing_buffer === 'Yellow') selected @endif>
                                                Yellow</option>
                                            <option value="Aqua" @if ($entry->outgoing_buffer === 'Aqua') selected @endif>
                                                Aqua</option>
                                            <option value="#FF007F" @if ($entry->outgoing_buffer === '#FF007F') selected @endif>
                                                #FF007F</option>
                                            <option value="#8F00FF" @if ($entry->outgoing_buffer === '#8F00FF') selected @endif>
                                                #8F00FF</option>

                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="passwordHelpInline3" class="form-text">
                                            <canvas id="square3" width="30px" height="30px"></canvas>
                                        </span>
                                    </div>
                                    <div class="col-auto col-auto-c m-l-200">
                                        <label for="outgoing_core" class="col-form-label">Core :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect04" onchange="changeColor4(this)">
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
                                            <option value="#0CC2C9" @if ($entry->outgoing_core === '#0CC2C9') selected @endif>
                                                #0CC2C9</option>
                                            <option value="White" @if ($entry->outgoing_core === 'White') selected @endif>
                                                White</option>
                                            <option value="Red" @if ($entry->outgoing_core === 'Red') selected @endif>
                                                Red</option>
                                            <option value="Black" @if ($entry->outgoing_core === 'Black') selected @endif>
                                                Black</option>
                                            <option value="Yellow" @if ($entry->outgoing_core === 'Yellow') selected @endif>
                                                Yellow</option>
                                            <option value="Aqua" @if ($entry->outgoing_core === 'Aqua') selected @endif>
                                                Aqua</option>
                                            <option value="#FF007F" @if ($entry->outgoing_core === '#FF007F') selected @endif>
                                                #FF007F</option>
                                            <option value="#8F00FF" @if ($entry->outgoing_core === '#8F00FF') selected @endif>
                                                #8F00FF</option>

                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="passwordHelpInline4" class="form-text">
                                            <canvas id="square4" width="30px" height="30px"></canvas>
                                        </span>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center m-t-2">
                                    <div class="col-auto">
                                        <label for="outgoing_buffer" class="col-form-label ">Buffer :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect03" onchange="changeColor3(this)">
                                            <option value="Blue" @if ($entry->outgoing_buffer === 'Blue') selected @endif>
                                                Blue</option>
                                            <option value="Orange" @if ($entry->outgoing_buffer === 'Orange') selected @endif>
                                                Orange</option>
                                            <!-- Add other options as required Blue, Orange, Green, Brown, #0CC2C9, White, Red, Black, Yellow, Aqua, #FF007F, #8F00FF-->
                                            <option value="Green" @if ($entry->outgoing_buffer === 'Green') selected @endif>
                                                Green</option>
                                            <option value="Brown" @if ($entry->outgoing_buffer === 'Brown') selected @endif>
                                                Brown</option>
                                            <option value="#0CC2C9" @if ($entry->outgoing_buffer === '#0CC2C9') selected @endif>
                                                #0CC2C9</option>
                                            <option value="White" @if ($entry->outgoing_buffer === 'White') selected @endif>
                                                White</option>
                                            <option value="Red" @if ($entry->outgoing_buffer === 'Red') selected @endif>
                                                Red</option>
                                            <option value="Black" @if ($entry->outgoing_buffer === 'Black') selected @endif>
                                                Black</option>
                                            <option value="Yellow" @if ($entry->outgoing_buffer === 'Yellow') selected @endif>
                                                Yellow</option>
                                            <option value="Aqua" @if ($entry->outgoing_buffer === 'Aqua') selected @endif>
                                                Aqua</option>
                                            <option value="#FF007F" @if ($entry->outgoing_buffer === '#FF007F') selected @endif>
                                                #FF007F</option>
                                            <option value="#8F00FF" @if ($entry->outgoing_buffer === '#8F00FF') selected @endif>
                                                #8F00FF</option>

                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="passwordHelpInline3" class="form-text">
                                            <canvas id="square3" width="30px" height="30px"></canvas>
                                        </span>
                                    </div>
                                    <div class="col-auto col-auto-c m-l-200">
                                        <label for="outgoing_core" class="col-form-label">Core :</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="inputGroupSelect04" onchange="changeColor4(this)">
                                            <option value="Blue" @if ($entry->outgoing_core === 'Blue') selected @endif>
                                                Blue</option>
                                            <option value="Orange" @if ($entry->outgoing_core === 'Orange') selected @endif>
                                                Orange</option>
                                            <!-- Add other options as required -->
                                            <option value="Green" @if ($entry->outgoing_core === 'Green') selected @endif>
                                                Green</option>
                                            <option value="Brown" @if ($entry->outgoing_core === 'Brown') selected @endif>
                                                Brown</option>
                                            <option value="#0CC2C9" @if ($entry->outgoing_core === '#0CC2C9') selected @endif>
                                                #0CC2C9</option>
                                            <option value="White" @if ($entry->outgoing_core === 'White') selected @endif>
                                                White</option>
                                            <option value="Red" @if ($entry->outgoing_core === 'Red') selected @endif>
                                                Red</option>
                                            <option value="Black" @if ($entry->outgoing_core === 'Black') selected @endif>
                                                Black</option>
                                            <option value="Yellow" @if ($entry->outgoing_core === 'Yellow') selected @endif>
                                                Yellow</option>
                                            <option value="Aqua" @if ($entry->outgoing_core === 'Aqua') selected @endif>
                                                Aqua</option>
                                            <option value="#FF007F" @if ($entry->outgoing_core === '#FF007F') selected @endif>
                                                #FF007F</option>
                                            <option value="#8F00FF" @if ($entry->outgoing_core === '#8F00FF') selected @endif>
                                                #8F00FF</option>

                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="passwordHelpInline4" class="form-text">
                                            <canvas id="square4" width="30px" height="30px"></canvas>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-3 m-t-20">
                                    <label for="user_email" class="form-label">Engineer Email</label>
                                    <input type="text" class="form-control" id="user_email" aria-describedby="emailHelp" name="user_email" value="{{ $entry->user_email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="text" class="form-control" id="time" name="time" value="{{ $entry->created_at }}">
                                </div>
                            </fieldset disabled>
                            <div class="container-login100-form-btn flex-col-c">
                                <button type="submit" class="btn btn-secondary add-btn">Save Edited Entry</button>
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
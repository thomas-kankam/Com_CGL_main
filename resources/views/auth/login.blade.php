@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title"
                    style="background-image: url('{{ asset('assets/plugins/images/bg-01.jfif') }}')">
                    <span class="login100-form-title-1">
                        Log In
                    </span>
                </div>
                <div class="logo-cont">
                    <img class="logo" src="{{ asset('assets/plugins/images/comsys.png') }}" alt="Logo">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Email</span>
                        <input type="email" class="input100" name="email" value="{{ old('email') }}" required
                            autocomplete="email" placeholder="Enter email" autofocus>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" autocomplete="password"
                            placeholder="Enter password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" type="checkbox" name="remember" id="ckb1"
                                value="{{ old('remember') ? 'checked' : '' }}" />
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        {{-- <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div> --}}
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">{{ __('Log In') }}</button>
                        <a class="login100-form-btn1" href="/register">{{ __('Sign Up') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

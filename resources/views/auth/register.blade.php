@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title"
                    style="background-image: url('{{ asset('assets/plugins/images/bg-01.jfif') }}')">
                    <span class="login100-form-title-1">
                        Sign Up
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
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Username</span>
                        <input type="text" class="input100" name="name" value="{{ old('name') }}" required
                            autocomplete="username" placeholder="Enter username" autofocus>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Work Email</span>
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

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Confirm Password</span>
                        <input class="input100" type="password" name="password_confirmation" autocomplete="password"
                            placeholder="Confirm password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Sign Up') }}
                        </button>
                        <a class="login100-form-btn1" href="/login">{{ __('Log In') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

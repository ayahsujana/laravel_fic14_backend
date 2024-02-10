@extends('layouts.page-app')

@section('title', 'Login POS')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('content')
    <div class="h-100">
        <div class="h-100 no-gutters row">
            <div class="d-none d-lg-block h-100 col-lg-5 col-xl-4">
                <div class="left-caption">
                    <img src="{{asset('storage/login.jpg')}}" class="bg-img"/>
                    <div class="caption">
                        <div>
                            <!-- logo -->
                            <h1 style="font-size: 60px; font-weight: bold;">KAPE POS</h1>


                            <p class="text">
                                Selamat datang di Kape POS, aplikasi kasir yang membantu bisnis Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-100 d-flex login-bg justify-content-center align-items-lg-center col-md-12 col-lg-7 col-xl-8">
                <div class="mx-auto col-sm-12 col-md-10 col-xl-8">
                    <div class="py-5">

                        <div class="app-logo mb-4">
                            <h1 class="primary-color mb-4 d-block d-lg-none">Kape POS</h1>
                            <h3 class="primary-color mb-0 font-weight-bold">Login</h3>
                        </div>

                        <h4 class="mb-0 font-weight-bold">
                            <span class="d-block mb-2">Welcome back, Admin</span>
                            <span>Please sign in to your account.</span>
                        </h4>

                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-row mt-4">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label>Email</label>
                                        <input name="email" placeholder="Email here..." type="email" class="form-control" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label>Password</label>
                                        <input name="password" placeholder="Password here..." type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror"
                        name="email" tabindex="1" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>

                    </div>
                    <input id="password" type="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror"
                        name="password" tabindex="2">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        @enderror

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
            </form>


        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="{{ route('register') }}">Create One</a>
    </div>
@endsection --}}

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

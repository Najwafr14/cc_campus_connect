<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Login') }} - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            height: 36px;
        }
        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .card {
            border-radius: 0.75rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
        .badge {
            font-weight: 500;
            padding: 0.4em 0.7em;
        }
        .btn {
            border-radius: 0.5rem;
        }
        .table-responsive {
            border-radius: 0.75rem;
            overflow: hidden;
        }
        .page-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 0.75rem;
            color: white;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            border: 1px solid #ced4da;
        }
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.15em;
        }
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Logo Header -->
                <div class="text-center mb-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="mb-3" style="height: 60px;" onerror="this.src='https://via.placeholder.com/120x60?text=Logo'">
                    </a>
                    <h2 class="h4 text-muted">{{ config('', '') }}</h2>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body p-4 p-md-5">
                        <!-- Page Header -->
                        <div class="page-header mb-4">
                            <h2 class="fw-bold fs-4 mb-0 d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                {{ __('Login to Your Account') }}
                            </h2>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                @error('email')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium">{{ __('Password') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                        <i class="bi bi-question-circle me-1"></i>
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center text-muted mt-4">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
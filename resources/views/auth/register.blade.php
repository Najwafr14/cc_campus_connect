<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Register') }} - {{ config('app.name', 'Laravel') }}</title>

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
        .stats-card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            height: 100%;
        }
        .stats-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
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
                                <i class="bi bi-person-plus me-2"></i>
                                {{ __('Create New Account') }}
                            </h2>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Id -->
                            <div class="mb-4">
                                <label for="id" class="form-label fw-medium">{{ __('NIM') }}</label>
                                <input id="id" class="form-control" type="text" name="id" value="{{ old('id') }}" required autofocus autocomplete="id">
                                @error('id')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-medium">{{ __('Name') }}</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium">{{ __('Password') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-medium">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Prodi -->
                            <div class="mb-4">
                                <label for="prodi_id" class="form-label fw-medium">{{ __('Program Studi') }}</label>
                                <select id="prodi_id" name="prodi_id" class="form-select" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach(\App\Models\Prodi::all() as $prodi)
                                        <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                                    @endforeach
                                </select>
                                @error('prodi_id')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a class="text-decoration-none text-primary" href="{{ route('login') }}">
                                    <i class="bi bi-arrow-left-short"></i> {{ __('Already registered?') }}
                                </a>

                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-person-plus me-2"></i>
                                    {{ __('Register') }}
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kelola Pengguna - Sistem Pengajuan Surat</title>

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

        .btn {
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 0.75rem;
            color: white;
        }

        .user-table {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .user-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .role-select {
            min-width: 150px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/120x36?text=Logo'">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tu.users.index') ? 'active fw-medium' : '' }}" href="{{ route('tu.users.index') }}">
                            {{ __('Manajemen Pengguna') }}
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Admin</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">{{ __('Profile') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="#">
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header">
                    <h1 class="h3 mb-0">Buat Pengguna Baru</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <h1>Create User</h1>
            <form action="{{ route('tu.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter NIM" value="{{ old('id') }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">Pilih Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ $role->nama_role }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="prodi_id" class="form-label fw-medium">{{ __('Program Studi') }}</label>
                    <select id="prodi_id" name="prodi_id" class="form-select" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach(\App\Models\Prodi::all() as $prodi)
                            <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>

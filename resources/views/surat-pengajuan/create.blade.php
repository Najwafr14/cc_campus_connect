<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
        .btn {
            border-radius: 0.5rem;
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
            padding: 0.6rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .instructions-card {
            background-color: rgba(13, 110, 253, 0.1);
            border-left: 4px solid #0d6efd;
            border-radius: 0.5rem;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .invalid-feedback {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/120x36?text=Logo'">
            </a>
            
            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                </ul>
                
                <!-- Settings Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); this.closest('form').submit();">
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
    <main>
        <!-- Page Header -->
        <div class="container mt-4">
            <div class="page-header shadow">
                <h2 class="fw-bold fs-4 d-flex align-items-center mb-0">
                    <i class="bi bi-file-earmark-plus me-2"></i>
                    {{ __('Buat Pengajuan Surat') }}
                </h2>
            </div>
        </div>

        <!-- Form Content -->
        <div class="container mb-5">
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <!-- Instructions Card -->
                    <div class="instructions-card p-4 mb-4">
                        <h5 class="text-primary fw-bold mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            Petunjuk Pengisian:
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Pilih tipe surat yang ingin diajukan</span>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Form akan menyesuaikan dengan tipe surat yang dipilih</span>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Untuk <strong>Surat Keterangan Kelulusan</strong>, tidak ada field tambahan yang perlu diisi</span>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Untuk <strong>Surat Keterangan Mahasiswa Aktif</strong>, isi semester dan keperluan</span>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Untuk <strong>Surat Pengantar Tugas Kuliah</strong>, isi kode MK, nama MK, topik, dan tujuan</span>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ps-3 py-1 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                <span>Untuk <strong>Laporan Hasil Studi</strong>, isi keperluan saja</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('Mahasiswa.surat-pengajuan.store') }}">
                        @csrf

                        <!-- Tipe Surat -->
                        <div class="mb-4">
                            <label for="tipe_surat_id" class="form-label">{{ __('Tipe Surat') }}</label>
                            <select id="tipe_surat_id" name="tipe_surat_id" class="form-select @error('tipe_surat_id') is-invalid @enderror" required>
                                <option value="">Pilih Tipe Surat</option>
                                @foreach($tipeSurats as $tipe)
                                    <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                @endforeach
                            </select>
                            @error('tipe_surat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fields for Surat Keterangan Mahasiswa Aktif -->
                        <div id="fields-mahasiswa-aktif" class="d-none form-section">
                            <div class="card border-0 bg-light mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Surat Keterangan Mahasiswa Aktif</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="semester" class="form-label">{{ __('Semester') }}</label>
                                        <input id="semester" type="text" name="semester" class="form-control @error('semester') is-invalid @enderror" placeholder="Contoh: 5 (Lima)">
                                        @error('semester')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="keperluan" class="form-label">{{ __('Keperluan') }}</label>
                                        <input id="keperluan" type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" placeholder="Contoh: Untuk keperluan beasiswa">
                                        @error('keperluan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fields for Surat Pengantar Tugas Kuliah -->
                        <div id="fields-pengantar-tugas" class="d-none form-section">
                            <div class="card border-0 bg-light mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Surat Pengantar Tugas Kuliah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="kode_mk" class="form-label">{{ __('Kode MK') }}</label>
                                        <input id="kode_mk" type="text" name="kode_mk" class="form-control @error('kode_mk') is-invalid @enderror" placeholder="Contoh: IF-301">
                                        @error('kode_mk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_mk" class="form-label">{{ __('Nama MK') }}</label>
                                        <input id="nama_mk" type="text" name="nama_mk" class="form-control @error('nama_mk') is-invalid @enderror" placeholder="Contoh: Pemrograman Web">
                                        @error('nama_mk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="topik" class="form-label">{{ __('Topik') }}</label>
                                        <input id="topik" type="text" name="topik" class="form-control @error('topik') is-invalid @enderror" placeholder="Contoh: Pengembangan Aplikasi Web">
                                        @error('topik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">{{ __('Tujuan') }}</label>
                                        <input id="tujuan" type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" placeholder="Contoh: PT. Teknologi Indonesia">
                                        @error('tujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fields for Laporan Hasil Studi -->
                        <div id="fields-hasil-studi" class="d-none form-section">
                            <div class="card border-0 bg-light mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Laporan Hasil Studi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="keperluan_lhs" class="form-label">{{ __('Keperluan') }}</label>
                                        <input id="keperluan_lhs" type="text" name="keperluan_lhs" class="form-control @error('keperluan_lhs') is-invalid @enderror" placeholder="Contoh: Untuk melamar pekerjaan">
                                        @error('keperluan_lhs')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Contoh: untuk melamar pekerjaan, untuk beasiswa, dsb.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fields for Surat Keterangan Kelulusan -->
                        <div id="fields-keterangan-lulus" class="d-none form-section">
                            <div class="card border-0 bg-light mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Surat Keterangan Kelulusan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info d-flex align-items-center" role="alert">
                                        <i class="bi bi-info-circle-fill me-2"></i>
                                        <div>
                                            Tidak ada field tambahan yang perlu diisi untuk Surat Keterangan Kelulusan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-1"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto border-top">
        <div class="container">
            <div class="text-center text-muted">
                &copy; {{ date('Y') }} Sistem Pengajuan Surat. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipeSuratSelect = document.getElementById('tipe_surat_id');
            const formSections = document.querySelectorAll('.form-section');
            
            const sectionMap = {
                '1': 'fields-mahasiswa-aktif',   // Surat Keterangan Mahasiswa Aktif
                '2': 'fields-pengantar-tugas',   // Surat Pengantar Tugas Kuliah
                '3': 'fields-keterangan-lulus',  // Surat Keterangan Kelulusan
                '4': 'fields-hasil-studi'        // Laporan Hasil Studi
            };
            
            tipeSuratSelect.addEventListener('change', function() {
                formSections.forEach(section => {
                    section.classList.add('d-none');
                    const inputs = section.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => {
                        input.removeAttribute('required');
                    });
                });

                const selectedTipeSurat = this.value;

                if (selectedTipeSurat && sectionMap[selectedTipeSurat]) {
                    const sectionToShow = document.getElementById(sectionMap[selectedTipeSurat]);
                    if (sectionToShow) {
                        sectionToShow.classList.remove('d-none');
                        
                        if (sectionMap[selectedTipeSurat] !== 'fields-keterangan-lulus') {
                            const inputs = sectionToShow.querySelectorAll('input, select, textarea');
                            inputs.forEach(input => {
                                input.setAttribute('required', 'required');
                            });
                        }
                    }
                }
            });
            
            if (tipeSuratSelect.value) {
                tipeSuratSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
</body>
</html>

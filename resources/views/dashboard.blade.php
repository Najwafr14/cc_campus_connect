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
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
        .badge {
            font-weight: 500;
            padding: 0.4em 0.7em;
        }
        .btn {
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        .detail-label {
            font-weight: 600;
            color: #495057;
            width: 150px;
        }
        .detail-value {
            color: #212529;
        }
        
        /* Enhanced Modal Styling */
        .modal-content {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .modal-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .modal-header.bg-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        /* Enhanced Detail Button */
        .btn-detail {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 0.375rem 0.75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .btn-detail:hover {
            background-color: #138496;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(23, 162, 184, 0.3);
        }
        .btn-detail i {
            margin-right: 0.375rem;
        }
        
        /* File Display in Modal */
        .file-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
        }
        .file-item:hover {
            background-color: #e9ecef;
        }
        .file-icon {
            font-size: 1.5rem;
            margin-right: 0.75rem;
        }
        
        /* Status Badge in Modal */
        .status-badge {
            padding: 0.4em 0.8em;
            border-radius: 50rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }
        .status-badge i {
            margin-right: 0.375rem;
        }
        
        /* Section Dividers */
        .section-divider {
            position: relative;
            margin: 1.5rem 0;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
        }
        
        /* Form Details Display */
        .form-details {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .form-details-item {
            margin-bottom: 0.75rem;
            border-bottom: 1px dashed #dee2e6;
            padding-bottom: 0.75rem;
        }
        
        .form-details-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .form-details-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.25rem;
        }
        
        .form-details-value {
            color: #212529;
        }
        
        /* Fix for modal display issues */
        .modal {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1050 !important;
        }
        
        /* Ensure modals are above other elements */
        .modal-backdrop {
            z-index: 1040 !important;
        }
        
        /* Fix for multiple backdrops */
        body.modal-open {
            overflow: hidden;
            padding-right: 0 !important;
        }
        
        /* Fix for modal content */
        .modal-dialog {
            margin: 1.75rem auto;
            max-width: 800px;
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
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-medium' : '' }}" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    @if(auth()->user() && auth()->user()->isTataUsaha())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tu.users.index') ? 'active fw-medium' : '' }}" href="{{ route('tu.users.index') }}">
                            {{ __('Manajemen Pengguna') }}
                        </a>
                    </li>
                    @endif
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
                    <i class="bi bi-file-earmark-text me-2"></i>
                    {{ __('Daftar Pengajuan Surat') }}
                </h2>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="container mb-5">
            @php
            // Query untuk statistik berdasarkan role user
            $query = DB::table('surat_pengajuans')
                ->join('tipe_surats', 'surat_pengajuans.tipe_surat_id', '=', 'tipe_surats.id')
                ->join('users', 'surat_pengajuans.user_id', '=', 'users.id')
                ->where('surat_pengajuans.prodi_id', auth()->user()->prodi_id);
            
            // Jika mahasiswa, hanya tampilkan pengajuannya sendiri
            if(auth()->user()->isMahasiswa()) {
                $query->where('surat_pengajuans.user_id', auth()->id());
            }
            
            $approvedCount = (clone $query)->where('status', 'Approved')->count();
            $pendingCount = (clone $query)->where('status', 'Pending')->count();
            $rejectedCount = (clone $query)->where('status', 'Rejected')->count();
            $totalCount = $approvedCount + $pendingCount + $rejectedCount;
        @endphp

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card stats-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="stats-icon bg-primary bg-opacity-10 me-3">
                                <i class="bi bi-file-earmark-text text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Pengajuan</h6>
                                <h3 class="fw-bold mb-0">{{ $approvedCount + $pendingCount + $rejectedCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stats-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="stats-icon bg-success bg-opacity-10 me-3">
                                <i class="bi bi-check-circle text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Disetujui</h6>
                                <h3 class="fw-bold mb-0">{{ $approvedCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stats-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="stats-icon bg-warning bg-opacity-10 me-3">
                                <i class="bi bi-hourglass-split text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Menunggu</h6>
                                <h3 class="fw-bold mb-0">{{ $pendingCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Card -->
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <!-- Alerts -->
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <div>
                                <strong>Sukses!</strong> {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>
                                <strong>Error!</strong> {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger d-flex mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2 mt-1"></i>
                            <div>
                                <strong>Terdapat kesalahan:</strong>
                                <ul class="mb-0 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Card Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="card-title fw-bold text-primary mb-0 d-flex align-items-center">
                            <i class="bi bi-file-earmark-text me-2"></i>
                            Daftar Pengajuan Surat
                        </h3>
                        
                        @if(auth()->user()->isMahasiswa())
                            <a href="{{ route('Mahasiswa.surat-pengajuan.create') }}" 
                               class="btn btn-primary d-flex align-items-center shadow-sm">
                                <i class="bi bi-plus-lg me-2"></i>
                                Buat Pengajuan Baru
                            </a>
                        @endif
                    </div>

                    <!-- Search and Filter -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Cari pengajuan...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">Semua Status</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="sortOrder">
                                <option value="latest">Terbaru</option>
                                <option value="oldest">Terlama</option>
                            </select>
                        </div>
                    </div>

                    @php
                    $query = DB::table('surat_pengajuans')
                        ->join('tipe_surats', 'surat_pengajuans.tipe_surat_id', '=', 'tipe_surats.id')
                        ->join('users', 'surat_pengajuans.user_id', '=', 'users.id')
                        ->where('surat_pengajuans.prodi_id', auth()->user()->prodi_id)
                        ->select('surat_pengajuans.*', 'tipe_surats.nama_tipe', 'users.name as user_name', 'surat_pengajuans.status');
                    
                    // Jika mahasiswa, hanya tampilkan pengajuannya sendiri
                    if(auth()->user()->isMahasiswa()) {
                        $query->where('surat_pengajuans.user_id', auth()->id());
                    }
                    
                    $suratPengajuans = $query->latest()->get();
                @endphp


                    <!-- Table or Empty State -->
                    @if($suratPengajuans->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="suratTable">
                                <thead class="table-primary text-primary">
                                    <tr>
                                        <th scope="col" class="fw-semibold">No</th>
                                        <th scope="col" class="fw-semibold">Tipe Surat</th>
                                        <th scope="col" class="fw-semibold">Tanggal</th>
                                        <th scope="col" class="fw-semibold">Status</th>
                                        <th scope="col" class="fw-semibold">Mahasiswa</th>
                                        <th scope="col" class="fw-semibold text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suratPengajuans as $index => $surat)
                                        @php
                                            $suratFile = App\Models\Surat::where('surat_pengajuan_id', $surat->id)->first();
                                            
                                            // Get form data from JSON if available
                                            $formData = json_decode($surat->form_data ?? '{}', true);
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                                    <span class="fw-medium">{{ $surat->nama_tipe }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-calendar3 text-primary me-2"></i>
                                                    {{ \Carbon\Carbon::parse($surat->created_at)->format('d/m/Y') }}
                                                </div>
                                            </td>
                                            <td>
                                                @if($surat->status === 'Approved')
                                                    <span class="badge bg-success d-flex align-items-center w-auto" style="width: fit-content">
                                                        <i class="bi bi-check-circle-fill me-1"></i>
                                                        Approved
                                                    </span>
                                                @elseif($surat->status === 'Rejected')
                                                    <span class="badge bg-danger d-flex align-items-center w-auto" style="width: fit-content">
                                                        <i class="bi bi-x-circle-fill me-1"></i>
                                                        Rejected
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning d-flex align-items-center w-auto" style="width: fit-content">
                                                        <i class="bi bi-hourglass-split me-1"></i>
                                                        Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person-fill text-primary me-2"></i>
                                                    {{ $surat->user_name }}
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <!-- View Details Button (for all users) -->
                                                <button type="button" class="btn btn-detail shadow-sm me-2 show-detail-modal" data-id="{{ $surat->id }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                    Detail
                                                </button>

                                                @if(auth()->user()->isMahasiswa())
                                                    @if($surat->status === 'Approved' && $suratFile)
                                                        <a href="{{ route('download.surat', $suratFile->id) }}" target="_blank" 
                                                           class="btn btn-outline-primary btn-sm d-inline-flex align-items-center">
                                                            <i class="bi bi-download me-1"></i>
                                                            Download
                                                        </a>
                                                    @elseif($surat->status === 'Approved' && !$suratFile)
                                                        <span class="text-muted fst-italic d-flex align-items-center justify-content-end">
                                                            <i class="bi bi-hourglass me-1"></i>
                                                            Menunggu upload
                                                        </span>
                                                    @endif
                                                @elseif(auth()->user()->isKaprodi())
                                                    @if($surat->status === 'Pending')
                                                        <div class="btn-group" role="group">
                                                            <form method="POST" action="{{ route('kaprodi.surat-pengajuan.approve', $surat->id) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success btn-sm me-2">
                                                                    <i class="bi bi-check-lg me-1"></i>
                                                                    Approve
                                                                </button>
                                                            </form>
                                                            <form method="POST" action="{{ route('kaprodi.surat-pengajuan.reject', $surat->id) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-x-lg me-1"></i>
                                                                    Reject
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @elseif($surat->status === 'Approved' && $suratFile)
                                                        <a href="{{ route('download.surat', $suratFile->id) }}" target="_blank" 
                                                           class="btn btn-outline-primary btn-sm d-inline-flex align-items-center">
                                                            <i class="bi bi-download me-1"></i>
                                                            Download
                                                        </a>
                                                    @elseif($surat->status === 'Approved' && !$suratFile)
                                                        <span class="text-muted fst-italic d-flex align-items-center justify-content-end">
                                                            <i class="bi bi-hourglass me-1"></i>
                                                            Menunggu upload
                                                        </span>
                                                    @endif
                                                @elseif(auth()->user()->isTataUsaha())
                                                    @if($surat->status === 'Approved')
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            @if($suratFile)
                                                                <a href="{{ route('download.surat', $suratFile->id) }}" target="_blank" 
                                                                   class="btn btn-outline-primary btn-sm me-2">
                                                                    <i class="bi bi-download me-1"></i>
                                                                    Download
                                                                </a>
                                                            @endif
                                                            
                                                            <form method="POST" action="{{ route('upload.surat') }}" enctype="multipart/form-data" class="d-inline">
                                                                @csrf
                                                                <input type="hidden" name="surat_pengajuan_id" value="{{ $surat->id }}">
                                                                <label class="btn btn-outline-success btn-sm mb-0 cursor-pointer">
                                                                    <i class="bi bi-upload me-1"></i>
                                                                    {{ $suratFile ? 'Ganti File' : 'Upload File' }}
                                                                    <input type="file" name="file" class="d-none" onchange="this.form.submit()">
                                                                </label>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="bi bi-file-earmark-x text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <h4 class="text-primary mb-2">Tidak ada pengajuan surat</h4>
                            <p class="text-muted mb-4">Belum ada pengajuan surat yang tersedia saat ini</p>
                            @if(auth()->user()->isMahasiswa())
                                <a href="{{ route('Mahasiswa.surat-pengajuan.create') }}" 
                                   class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-plus-lg me-2"></i>
                                    Buat Pengajuan Baru
                                </a>
                            @endif
                        </div>
                    @endif
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

    <!-- Modals Container - Will be populated dynamically -->
    <div id="modalsContainer"></div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Search functionality
        document.getElementById('searchInput')?.addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const table = document.getElementById('suratTable');
            const rows = table?.getElementsByTagName('tr');

            for (let i = 1; i < rows?.length; i++) {
                let found = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    
                    if (cellText.toLowerCase().indexOf(searchValue) > -1) {
                        found = true;
                        break;
                    }
                }
                
                rows[i].style.display = found ? '' : 'none';
            }
        });

        // Status filter
        document.getElementById('statusFilter')?.addEventListener('change', function() {
            const filterValue = this.value.toLowerCase();
            const table = document.getElementById('suratTable');
            const rows = table?.getElementsByTagName('tr');

            for (let i = 1; i < rows?.length; i++) {
                if (!filterValue) {
                    rows[i].style.display = '';
                    continue;
                }
                
                const statusCell = rows[i].getElementsByTagName('td')[3];
                const statusText = statusCell.textContent || statusCell.innerText;
                
                rows[i].style.display = statusText.toLowerCase().includes(filterValue) ? '' : 'none';
            }
        });

        // Sort order
        document.getElementById('sortOrder')?.addEventListener('change', function() {
            const sortValue = this.value;
            const table = document.getElementById('suratTable');
            const tbody = table?.querySelector('tbody');
            const rows = Array.from(tbody?.querySelectorAll('tr') || []);
            
            // Sort rows based on date (3rd column)
            rows.sort((a, b) => {
                const dateA = new Date(a.cells[2].textContent.trim().split(' ')[1].split('/').reverse().join('-'));
                const dateB = new Date(b.cells[2].textContent.trim().split(' ')[1].split('/').reverse().join('-'));
                
                return sortValue === 'latest' ? dateB - dateA : dateA - dateB;
            });
            
            // Append sorted rows
            rows.forEach(row => tbody?.appendChild(row));
            
            // Update row numbers
            rows.forEach((row, index) => {
                row.cells[0].textContent = index + 1;
            });
        });
        
        // Improved modal handling
        document.addEventListener('DOMContentLoaded', function() {
            // Generate all modals dynamically
            const modalsContainer = document.getElementById('modalsContainer');
            
            @foreach($suratPengajuans as $surat)
                @php
                    $suratFile = App\Models\Surat::where('surat_pengajuan_id', $surat->id)->first();
                @endphp
                
                // Create modal HTML
                const modalHtml{{ $surat->id }} = `
                    <div class="modal fade" id="detailModal{{ $surat->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $surat->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title fw-bold" id="detailModalLabel{{ $surat->id }}">
                                        <i class="bi bi-file-earmark-text me-2"></i>
                                        Detail Pengajuan Surat
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Status Badge -->
                                    <div class="mb-4 text-center">
                                        @if($surat->status === 'Approved')
                                            <span class="status-badge bg-success text-white">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Disetujui
                                            </span>
                                        @elseif($surat->status === 'Rejected')
                                            <span class="status-badge bg-danger text-white">
                                                <i class="bi bi-x-circle-fill"></i>
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="status-badge bg-warning text-white">
                                                <i class="bi bi-hourglass-split"></i>
                                                Menunggu Persetujuan
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <!-- Informasi Surat -->
                                    <h6 class="section-divider">Informasi Surat</h6>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <span class="detail-label">Tipe Surat</span>
                                                <span class="detail-value">: {{ $surat->nama_tipe }}</span>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <span class="detail-label">Tanggal Pengajuan</span>
                                                <span class="detail-value">: {{ \Carbon\Carbon::parse($surat->created_at)->format('d/m/Y H:i') }}</span>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <span class="detail-label">Status</span>
                                                <span class="detail-value">: 
                                                    @if($surat->status === 'Approved')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif($surat->status === 'Rejected')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @else
                                                        <span class="badge bg-warning">Pending</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <span class="detail-label">NIM</span>
                                                <span class="detail-value">: {{ $surat->user_id ?? '-' }}</span>
                                            </div>
                                    <div class="d-flex mb-2">
                                        <span class="detail-label">Nama Mahasiswa</span>
                                        <span class="detail-value">: {{ $surat->user_name }}</span>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <span class="detail-label">Program Studi</span>
                                        <span class="detail-value">: {{ auth()->user()->prodi->nama_prodi ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Data Details -->
                            <h6 class="section-divider">Data Formulir</h6>
                            <div class="form-details">
                                <div class="row">
                                    @if($surat->semester)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Semester</div>
                                            <div class="form-details-value">{{ $surat->semester }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->keperluan)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Keperluan</div>
                                            <div class="form-details-value">{{ $surat->keperluan }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->kode_mk)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Kode Mata Kuliah</div>
                                            <div class="form-details-value">{{ $surat->kode_mk }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->nama_mk)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Nama Mata Kuliah</div>
                                            <div class="form-details-value">{{ $surat->nama_mk }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->tujuan)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Tujuan</div>
                                            <div class="form-details-value">{{ $surat->tujuan }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->topik)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">Topik</div>
                                            <div class="form-details-value">{{ $surat->topik }}</div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($surat->file_path)
                                    <div class="col-md-6">
                                        <div class="form-details-item">
                                            <div class="form-details-label">File Lampiran</div>
                                            <div class="form-details-value">
                                                <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-file-earmark me-1"></i>Lihat Lampiran
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                @if(!$surat->semester && !$surat->keperluan && !$surat->kode_mk && !$surat->nama_mk && !$surat->tujuan && !$surat->topik && !$surat->file_path)
                                <div class="text-center text-muted py-3">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Tidak ada data formulir yang tersedia
                                </div>
                                @endif
                            </div>

                            <!-- Keterangan -->
                            <h6 class="section-divider">Keterangan</h6>
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <p class="mb-0">{{ $surat->keterangan ?? 'Tidak ada keterangan tambahan' }}</p>
                            </div>

                            <!-- File Surat -->
                            @if($suratFile)
                            <h6 class="section-divider">File Surat</h6>
                            <div class="file-item mb-4">
                                <i class="bi bi-file-earmark-pdf text-danger file-icon"></i>
                                <div>
                                    <div class="fw-medium">{{ $suratFile->nama_file }}</div>
                                    <small class="text-muted">Diupload: {{ \Carbon\Carbon::parse($suratFile->created_at)->format('d/m/Y H:i') }}</small>
                                </div>
                                <a href="{{ route('download.surat', $suratFile->id) }}" class="btn btn-sm btn-primary ms-auto">
                                    <i class="bi bi-download me-1"></i> Download
                                </a>
                            </div>
                            @endif

                            <!-- Persetujuan -->
                            @if(auth()->user()->isKaprodi() && $surat->status === 'Pending')
                            <h6 class="section-divider">Persetujuan</h6>
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <form method="POST" action="{{ route('kaprodi.surat-pengajuan.reject', $surat->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-4">
                                        <i class="bi bi-x-lg me-2"></i>
                                        Tolak Pengajuan
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('kaprodi.surat-pengajuan.approve', $surat->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="bi bi-check-lg me-2"></i>
                                        Setujui Pengajuan
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x me-1"></i> Tutup
                            </button>
                            @if($suratFile)
                            <a href="{{ route('download.surat', $suratFile->id) }}" class="btn btn-primary">
                                <i class="bi bi-download me-1"></i>
                                Download Surat
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Append modal to container
        modalsContainer.insertAdjacentHTML('beforeend', modalHtml{{ $surat->id }});
    @endforeach
    
    // Set up event listeners for detail buttons
    const detailButtons = document.querySelectorAll('.show-detail-modal');
    detailButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const modalId = `detailModal${id}`;
            
            // Remove any existing modal backdrops
            const existingBackdrops = document.querySelectorAll('.modal-backdrop');
            existingBackdrops.forEach(backdrop => backdrop.remove());
            
            // Remove modal-open class from body
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
            
            // Get the modal element
            const modalElement = document.getElementById(modalId);
            
            if (modalElement) {
                // Create a new modal instance
                const modal = new bootstrap.Modal(modalElement, {
                    backdrop: true,
                    keyboard: true,
                    focus: true
                });
                
                // Show the modal
                modal.show();
                
                // Add event listener to clean up when modal is hidden
                modalElement.addEventListener('hidden.bs.modal', function() {
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());
                });
            }
        });
    });
});
    </script>
</body>
</html>

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratPengajuanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuratController;

// Halaman Welcome (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Login, Register, dll)
require __DIR__.'/auth.php';

// =============================================
// ROUTE SETELAH LOGIN (BERDASARKAN ROLE)
// =============================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Redirect setelah login berdasarkan role
    Route::get('/home', function () {
        $user = Auth::user();

        // Cek jika user tidak memiliki role
        if (!$user->role) {
            return redirect('/')->with('error', 'Anda tidak memiliki role yang valid!');
        }

        // Redirect berdasarkan role_id
        if ($user->role_id == 1) { // Mahasiswa
            
            return redirect()->route('ahasiswa.dashboard');
        } elseif ($user->role_id == 2) { // Kaprodi
            return redirect()->route('kaprodi.dashboard');
        } elseif ($user->role_id == 3) { // Tata Usaha
            return redirect()->route('tu.dashboard');
        }

        return redirect('/dashboard'); // Default jika role tidak ditemukan
    })->name('home');

    // Dashboard umum (bisa diakses semua role)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    

    Route::get('/download/{id}', [SuratController::class, 'download'])->name('download.surat');
    Route::post('/upload', [SuratController::class, 'upload'])->name('upload.surat');


    // Profile routes (bisa diakses semua role)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =============================================
    // ROUTES MAHASISWA (Role ID = 1)
    // =============================================
    Route::prefix('Mahasiswa')->name('Mahasiswa.')->middleware(['auth', ])->group(function () {
        Route::get('/Mahasiswa.dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('surat-pengajuan.index');

        // Dynamic form fields untuk surat pengajuan
        Route::get('/surat-pengajuan/get-fields/{tipeSuratId}', [SuratPengajuanController::class, 'getFields'])
            ->name('surat-pengajuan.get-fields');

        // CRUD Surat Pengajuan
        Route::prefix('surat-pengajuan')->group(function () {
            Route::get('/', [SuratPengajuanController::class, 'index'])->name('surat-pengajuan.index');
            Route::get('/create', [SuratPengajuanController::class, 'create'])->name('surat-pengajuan.create');
            Route::post('/', [SuratPengajuanController::class, 'store'])->name('surat-pengajuan.store');
        });
    });

    // =============================================
    // ROUTES KAPRODI (Role ID = 2)
    // =============================================
    Route::prefix('Kaprodi')->name('kaprodi.')->middleware(['auth', ])->group(function () {
        Route::get('/dashboard', function () {
            return view('kaprodi.dashboard');
        })->name('dashboard');

        // Approve/Reject Surat
        Route::post('/surat-pengajuan/{id}/approve', [SuratPengajuanController::class, 'approve'])
            ->name('surat-pengajuan.approve');
        Route::post('/surat-pengajuan/{id}/reject', [SuratPengajuanController::class, 'reject'])
            ->name('surat-pengajuan.reject');
    });

    // =============================================
    // ROUTES TATA USAHA (Role ID = 3)
    // =============================================
    Route::prefix('tu')->name('tu.')->middleware(['auth', ])->group(function () {
        Route::get('/dashboard', function () {
            return view('tu.dashboard');
        })->name('dashboard');

        // Upload Surat
        Route::post('/surat-pengajuan/{id}/upload', [SuratPengajuanController::class, 'upload'])
            ->name('surat-pengajuan.upload');

        // User Management
        Route::resource('users', UserController::class)->only(['index', 'destroy']);
        Route::post('/users/{user}/update-role', [UserController::class, 'updateRole'])
            ->name('users.update-role');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    });

    // =============================================
    // ROUTES YANG BISA DIAKSES SEMUA ROLE
    // =============================================
    Route::get('/surat-pengajuan/{id}', [SuratPengajuanController::class, 'show'])
        ->name('surat-pengajuan.show');
});

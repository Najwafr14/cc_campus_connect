<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate untuk mahasiswa
        Gate::define('isMahasiswa', function (User $user) {
            return $user->role->nama_role === 'Mahasiswa';
        });

        // Gate untuk kaprodi
        Gate::define('isKaprodi', function (User $user) {
            return $user->role->nama_role === 'Kaprodi';
        });

        // Gate untuk tata usaha
        Gate::define('isTataUsaha', function (User $user) {
            return $user->role->nama_role === 'Tata saha';
        });

        // Gate untuk aksi spesifik (contoh: approve surat)
        Gate::define('approve-surat', function (User $user) {
            return $user->role->nama_role === 'kaprodi' || $user->role->nama_role === 'tata usaha';
        });
    }
}
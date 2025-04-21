<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna belum login
        if (!Auth::check()) {
            return redirect()->route('login');  // Arahkan ke halaman login jika belum terautentikasi
        }

        $user = Auth::user();

        // Cek role pengguna dan arahkan sesuai dengan role-nya
        if ($user->role_id == 1) {  // Role Mahasiswa
            return redirect()->route('surat-pengajuan.index');
        } elseif ($user->role_id == 2) {  // Role Kaprodi
            return redirect()->route('kaprodi.dashboard');
        } elseif ($user->role_id == 3) {  // Role Tata Usaha
            return redirect()->route('tu.dashboard');
        }

        return $next($request);  // Jika role sesuai, lanjutkan request
    }
}

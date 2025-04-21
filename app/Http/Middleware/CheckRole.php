<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Memeriksa apakah role_id pengguna sesuai dengan yang diminta
        if ($user->role_id != $role) {
            return redirect('/dashboard')->with('error', 'Akses ditolak! Anda tidak memiliki hak akses.');
        }

        return $next($request);
    }
}

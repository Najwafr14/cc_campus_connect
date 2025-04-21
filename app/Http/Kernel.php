<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Auth\Middleware\Authenticate;


class Kernel extends HttpKernel
{
    /**
     * Middleware yang berjalan secara global dalam aplikasi.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    
        \Illuminate\Http\Middleware\HandleCors::class,
        
    ];

    /**
     * Middleware yang dikelompokkan berdasarkan jenis route.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\Auth\Middleware\Authenticate::class, 
        ],
    
        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
    
    /**
     * Middleware khusus yang bisa dipanggil dalam route.
     *
     * @var array
     */
    protected $routeMiddleware = [
        
        
        'auth' => Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'role' => \App\Http\Middleware\CheckRole::class,
        'auth' => \App\Http\Middleware\Authenticate::class, 

        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
        
}

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route; // JANGAN LUPA IMPORT INI

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Daftarkan route Admin
            Route::middleware(['web', 'auth:admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            // Daftarkan route Customer
            Route::middleware(['web', 'auth:customer'])
                ->prefix('customer')
                ->group(base_path('routes/customer.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Izinkan Midtrans mengirim POST tanpa CSRF Token
        $middleware->validateCsrfTokens(except: [
            '/payment/webhook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

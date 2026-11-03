<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // TRUSTED_PROXIES=* (défaut) ou liste d'IP séparées par des virgules,
        // ex. TRUSTED_PROXIES=127.0.0.1,10.0.0.5 (voir .env.example).
        // config() n'est pas encore lié au bootstrap de la console : repli env().
        $trustedProxies = app()->bound('config')
            ? config('app.trusted_proxies', '*')
            : env('TRUSTED_PROXIES', '*');

        if (is_string($trustedProxies) && $trustedProxies !== '*') {
            $trustedProxies = array_values(array_filter(array_map('trim', explode(',', $trustedProxies))));
        }

        $middleware->trustProxies(
            at: $trustedProxies,
            headers: Request::HEADER_X_FORWARDED_FOR
                | Request::HEADER_X_FORWARDED_HOST
                | Request::HEADER_X_FORWARDED_PORT
                | Request::HEADER_X_FORWARDED_PROTO,
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

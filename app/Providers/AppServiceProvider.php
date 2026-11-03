<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Dates en français (diffForHumans, translatedFormat, ...)
        Carbon::setLocale(config('app.locale'));

        // Derrière un reverse proxy : forcer le domaine public en production,
        // même si X-Forwarded-Host n'est pas transmis (sinon Location/asset
        // pointeraient vers le port interne du proxy).
        $appUrl = config('app.url');

        if (config('app.env') !== 'local' && $appUrl && ! str_contains($appUrl, 'localhost')) {
            URL::forceRootUrl($appUrl);
            URL::forceScheme(parse_url($appUrl, PHP_URL_SCHEME) ?: 'https');
        }
    }
}

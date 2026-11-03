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
        // Jamais en 'local' ni en 'testing' (les tests pilotent leurs propres URLs).
        $appUrl = config('app.url');
        $env = config('app.env');

        if (! in_array($env, ['local', 'testing'], true) && $appUrl && ! str_contains($appUrl, 'localhost')) {
            // useOrigin() remplace forceRootUrl() (déprécié). Attention : en
            // Laravel 13, useOrigin() ne fait que déléguer à forceRootUrl() et
            // ne fige pas le scheme (formatRoot réapplique celui de la requête),
            // d'où le forceScheme() conservé.
            URL::useOrigin($appUrl);
            URL::forceScheme(parse_url($appUrl, PHP_URL_SCHEME) ?: 'https');
        }
    }
}

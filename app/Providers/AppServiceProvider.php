<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
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
        Carbon::setLocale(config("app.locale"));

        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return route("password.reset", ["token" => $token]);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settings = cache()->remember('site_settings', now()->addMinutes(30), function () {
                return Setting::query()->pluck('value', 'key')->toArray();
            });

            $view->with('siteSettings', $settings);
        });
    }
}

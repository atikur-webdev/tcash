<?php

namespace App\Providers;

use App\Models\Section;
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
        view()->composer('*', function ($view) {
            $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

            $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

            $footerContent = Section::where('data_key', 'footer-content')->first();

            $view->with(compact('siteSettingContent', 'siteSettingElement', 'footerContent'));
        });
    }
}

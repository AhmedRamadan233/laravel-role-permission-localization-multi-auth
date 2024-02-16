<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
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
        // $locale = request('locale', Cookie::get('locale', config('app.locale')));
        // if (strlen($locale) > 2) {
        // $locale = Crypt::decrypt($locale);
        // App::setLocale ($locale);
        // Cookie::queue ('locale', $locale, 60 * 24 * 365);
        // // dd ($locale);
        // }
    }
}
    


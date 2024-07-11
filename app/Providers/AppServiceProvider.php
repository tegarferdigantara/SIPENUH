<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\UmrahPackage;
use Illuminate\Support\Facades\View;
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
        View::composer('admin.layouts.app', function ($view) {
            $umrahPackages = UmrahPackage::orderByRaw("
            CASE
                WHEN status = 'FULL' THEN 1
                WHEN status = 'ACTIVE' THEN 2
                WHEN status = 'CLOSED' THEN 3
                ELSE 4 -- Default case, jika ada status lain yang tidak terdaftar
            END")->get();

            $view->with('umrahPackages', $umrahPackages);
        });
    }
}

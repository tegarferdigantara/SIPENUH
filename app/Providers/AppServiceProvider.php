<?php

namespace App\Providers;

use App\Http\Controllers\WhatsAppController;
use App\Models\ChatbotApiKey;
use App\Models\Customer;
use App\Models\UmrahPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
        Carbon::setLocale('id');
        View::composer('admin.layouts.app', function ($view) {
            $umrahPackages = UmrahPackage::orderByRaw("
            CASE
                WHEN status = 'FULL' THEN 1
                WHEN status = 'ACTIVE' THEN 2
                WHEN status = 'CLOSED' THEN 3
                ELSE 4 -- Default case, jika ada status lain yang tidak terdaftar
            END")->get();
            $whatsappStatus = (new WhatsAppController)->checkWhatsAppStatus();

            $view->with('whatsappStatus', $whatsappStatus);
            $view->with('umrahPackages', $umrahPackages);
        });

        Blade::directive('currency', function ($expression) {
            return "<?php echo 'Rp ' . number_format($expression, 2, ',', '.'); ?>";
        });
    }
}

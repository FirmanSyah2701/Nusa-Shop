<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //translate tangggal
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Blade::directive('date', function ($param) {
            return "<?= \Carbon\Carbon::parse($param)->translatedFormat(' F Y'); ?>";
        });
        
        //mata uang
        Blade::directive('currency', function($exp){
            return "Rp. <?= number_format($exp, 0, ',', '.'); ?>";
        });        
    }
}

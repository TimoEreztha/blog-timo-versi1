<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('depan.template', function ($view) {
            $configKeys = ['judul_blog','desc_blog','footer'];
            $config = Config::whereIn('name',$configKeys)->pluck('value','name');
            $view->with('config', $config);
        });
    }
}

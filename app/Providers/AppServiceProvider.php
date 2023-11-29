<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Utilities\ShopifyRoute;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Blade;
use App\Utilities\SessionToken;
use Osiset\ShopifyApp\Macros\TokenRoute;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        UrlGenerator::macro('shopifyRoute', new ShopifyRoute());
        Blade::directive('sessionToken', new SessionToken());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

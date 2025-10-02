<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Catalog\Services\ProductService;
use Modules\Common\Contracts\Services\OrderProductConverterContract;
use Modules\Common\Contracts\Services\ProductServiceContract;
use Modules\OrderProductConverter\Providers\OrderProductConverterServiceProvider;
use Modules\OrderProductConverter\Services\OrderProductConverterService;

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
        //
    }
}

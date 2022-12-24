<?php

namespace App\Providers;

use App\Repositories\AdminCategory\AdminCategory;
use App\Repositories\AdminCategory\IAdminCategory;
use App\Repositories\AdminKeyword\AdminKeyword;
use App\Repositories\AdminKeyword\IAdminKeyword;
use App\Repositories\AdminProduct\AdminProduct;
use App\Repositories\AdminProduct\IAdminProduct;
use App\Repositories\IRepository;
use App\Repositories\Repository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IRepository::class, Repository::class);
        $this->app->singleton(IAdminCategory::class, AdminCategory::class);
        $this->app->singleton(IAdminKeyword::class, AdminKeyword::class);
        $this->app->singleton(IAdminProduct::class, AdminProduct::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $admmCategory = new AdminCategory();
        $categories = $admmCategory->all();

        View::share('categories', $categories);
    }
}

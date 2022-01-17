<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $productos= Producto::paginate(3);
        $categorias = Categoria::all();
        view()->share(['productos'=>$productos, 'categorias'=>$categorias]);
    }
}

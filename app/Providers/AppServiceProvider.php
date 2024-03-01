<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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
        //
        view::share('arrCate', DB::table('danhmucsanpham')->get());
        Paginator::useBootstrap();
        View::share('arrImg',DB::table('hinhanh')->get());
        view::share('arrProduct',DB::table('sanpham')->get());

    }
}

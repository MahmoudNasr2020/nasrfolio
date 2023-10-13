<?php

namespace App\Providers;

use App\Models\Detail;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        $details = Detail::orderBy('id','desc')->first();
       \view()->share('details',$details);
    }
}

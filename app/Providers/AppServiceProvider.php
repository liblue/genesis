<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Admin;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $role=Cache::get('role');
//
        
        view()->share('share',  $role);
       
     
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        
     
    }
}

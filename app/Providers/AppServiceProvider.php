<?php

namespace App\Providers;
use App;
use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function ($view){
          $archive = \App\Post::archive();
          $tags = \App\Tag::has('posts')->pluck('name');
          $view->with(compact('archive','tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

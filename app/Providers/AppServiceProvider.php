<?php

namespace App\Providers;

use App\Events\UserRegister;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        // Event::listen(
        //     UserRegister::class ,
        //     SendWelcomeEmail::class ,
        // );
        Event::subscribe(SendWelcomeEmail::class);

    }
}

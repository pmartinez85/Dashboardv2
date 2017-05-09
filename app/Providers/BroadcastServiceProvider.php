<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use App\Observers\UserObserver;


class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        User::observe(UserObserver::class);

        require base_path('routes/channels.php');
    }
}

<?php

namespace App\Providers;

use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\NotificationRepository;
use App\Repositories\IClientRepository;
use App\Repositories\INotificationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IClientRepository::class, ClientRepository::class);
        $this->app->bind(INotificationRepository::class, NotificationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('UserService', function ($app) {
            return new AuthService();
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('UserService', function ($app) {
            return new BookService();
        });
    }
}

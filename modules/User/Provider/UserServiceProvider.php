<?php


namespace Modules\User\Provider;


use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user-route.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views' , 'User');
    }

    public function register()
    {
        config()->set('auth.providers.users.model', User::class);
    }

}

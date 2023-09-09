<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

         // 管理者ユーザー
         Gate::define('admin', function (User $user) {
            return ($user->role === 100);
        });

        // 編集者ユーザー
        Gate::define('editor', function (User $user) {
            return ($user->role >= 50);
        });

        // 閲覧者ユーザー
        Gate::define('viewer', function (User $user) {
            return ($user->role >= 10);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Publication;
use App\Policies\CommentPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create-comment', function (User $user, Publication $publication) {
            $authorize = true;
            $user_in_comment = $publication->comments()->where('user_id', $user->id)->count();

            if ($user_in_comment > 0) {
                $authorize = false;
            }

            return $authorize;
        });
        //
    }
}

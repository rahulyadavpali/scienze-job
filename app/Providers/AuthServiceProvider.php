<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $user = \Auth::user();

        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Setting
        Gate::define('setting_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Job
        Gate::define('job_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('job_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('job_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('job_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('job_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Blog
        Gate::define('home_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('home_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('home_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('home_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('home_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Blog
        Gate::define('plan_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('plan_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('plan_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('plan_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('plan_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Blog
        Gate::define('blog_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('blog_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('blog_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Category
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Designation
        Gate::define('designation_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('designation_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('designation_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('designation_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('designation_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Information
        Gate::define('information_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('information_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('information_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('information_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('information_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Registration
        Gate::define('registration_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('registration_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('registration_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('registration_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('registration_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Form
        Gate::define('form_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('form_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('form_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('form_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('form_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        $this->registerPolicies();

        Passport::routes();

    }
}

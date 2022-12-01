<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPassport();
    }

    private function registerPassport()
    {
        Passport::tokensExpireIn(now()->addMinutes(45000));
        Passport::refreshTokensExpireIn(now()->addDays(15));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}

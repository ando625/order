<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Actions\Fortify\AdminLogoutResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Actions\Fortify\AdminLoginResponse;

class FortifyServiceProvider extends ServiceProvider
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

        $this->app->singleton(
            LoginResponse::class,
            AdminLoginResponse::class
        );

        Fortify::loginView(function () {
            return view('admin.login');
        });

        $this->app->singleton(
            LogoutResponse::class,
            AdminLogoutResponse::class
        );


        Fortify::loginView(function () {
            return view('admin.login');
        });

        Fortify::registerView(function () {
            return view('admin.register');
        });


        Fortify::createUsersUsing(CreateNewUser::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(20)->by($throttleKey);
        });


    }
}

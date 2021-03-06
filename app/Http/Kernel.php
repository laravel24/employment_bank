<?php

namespace employment_bank\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \employment_bank\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \employment_bank\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        //'auth' => \employment_bank\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.candidate'  =>  \employment_bank\Http\Middleware\AuthenticateCandidate::class,
        'auth.admin'  =>  \employment_bank\Http\Middleware\AuthenticateAdmin::class,
        'auth.employer'  =>  \employment_bank\Http\Middleware\AuthenticateEmployer::class,
        'guest' => \employment_bank\Http\Middleware\RedirectIfAuthenticated::class,
        'guest.candidate' =>  \employment_bank\Http\Middleware\RedirectCandidateIfAuthenticated::class,
        'guest.admin' =>  \employment_bank\Http\Middleware\RedirectAdminIfAuthenticated::class,
        'guest.employer' =>  \employment_bank\Http\Middleware\RedirectEmployerIfAuthenticated::class,
    ];
}

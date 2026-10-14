<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\PreventBackHistory;

return Application::configure(
    basePath: dirname(__DIR__)
)

    ->withRouting(

        web: __DIR__.'/../routes/web.php',

        api: __DIR__.'/../routes/api.php',

        commands: __DIR__.'/../routes/console.php',

        health: '/up',

    )

    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([

            'admin' =>
                AdminMiddleware::class,

            'staff' =>
                StaffMiddleware::class,

            'customer' =>
                CustomerMiddleware::class,

            'prevent.back' =>
                PreventBackHistory::class,

        ]);

        // Redirect logged-in users away from Login/Register
        // and send them to their correct dashboard.
        $middleware->redirectUsersTo(function (Request $request) {

            $user = $request->user();

            if (!$user) {
                return '/';
            }

            $role = strtolower(trim($user->role ?? ''));

            if ($role === 'admin') {
                return route('admin.dashboard');
            }

            if ($role === 'staff') {
                return route('staff.dashboard');
            }

            if ($role === 'customer') {
                return route('customer.dashboard');
            }

            // Unknown role: send to root so its existing
            // role check can log out the user.
            return '/';

        });

    })

    ->withExceptions(function (Exceptions $exceptions) {

        //

    })

    ->create();
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\UserActivity;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        // Alias middleware custom kamu
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'user'  => UserMiddleware::class,
        ]);

        // Tambahkan middleware global ke group web
        $middleware->web(append: [
            UserActivity::class,
        ]);
    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
    )
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();

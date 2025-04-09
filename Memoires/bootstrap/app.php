<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) 
        {
            $middleware->alias
            (
                [
                    'admin'=>\App\Http\Middleware\AdminMiddleware::class,
                    'responsable'=>\App\Http\Middleware\ResponsableMiddleware::class,
                    'directeur'=>\App\Http\Middleware\DirecteurMiddleware::class,
                    'chefprojet'=>\App\Http\Middleware\ChefProjetMiddleware::class,
                ]
            );


        })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

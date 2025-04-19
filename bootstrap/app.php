<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureUserIsUser;
use App\Http\Middleware\EnsureUserIsVolunteer;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

$app->afterResolving(\Illuminate\Foundation\Http\Kernel::class, function ($kernel) {
    $kernel->appendMiddlewareToGroup('web', EnsureUserIsUser::class);
    $kernel->appendMiddlewareToGroup('web', EnsureUserIsVolunteer::class);
    
    // ИЛИ если нужно использовать как route middleware (с алиасами):
    $kernel->appendToMiddlewarePriority([
        'user' => EnsureUserIsUser::class,
        'volunteer' => EnsureUserIsVolunteer::class,
    ]);
});
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiValidationRoute
{

    public function handle(Request $request, Closure $next)
    {
        $request->headers->add(['accept' => 'application/json']);
        return $next($request);
    }
}

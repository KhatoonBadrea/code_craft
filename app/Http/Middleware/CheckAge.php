<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
       public function handle(Request $request, Closure $next): Response
    {
        if ($request->age < 18) {
            return response('Access Denied. You must be at least 18 years old.', 403);
        }

        return $next($request);
    }
}

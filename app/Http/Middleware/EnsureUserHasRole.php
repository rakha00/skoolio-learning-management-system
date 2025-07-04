<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if user's role is not in the list of allowed roles.
        if (!$request->user() || !in_array($request->user()->role->value, $roles)) {
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        return $next($request);
    }
}

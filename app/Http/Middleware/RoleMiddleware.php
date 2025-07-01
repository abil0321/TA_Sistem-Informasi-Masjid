<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (! $request->user()->hasRole($role)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. You do not have the required role.'
            ], 403);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if (! $request->user()->hasPermissionTo($permission)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. You do not have the required permission.'
            ], 403);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\staff;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
         $userRole = session()->get('role');
    $user = auth()->user();

    Log::info('User role from session: ' . $userRole);
    Log::info('Allowed roles: ' . implode(', ', $roles));

    // Check if the user role is in the allowed roles
    if (!in_array($userRole, $roles)) {
        Log::warning('Access denied for role: ' . $userRole);
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
    }
}




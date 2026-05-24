<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // CHECK IF USER IS LOGGED IN
        if (!Auth::check()) {

            abort(403);

        }

        // GET LOGGED IN USER
        $user = Auth::user();

        // GET USER ROLE
        $userRole = strtolower(trim($user->role));

        // CLEAN ALLOWED ROLES
        $allowedRoles = array_map(function ($role) {

            return strtolower(trim($role));

        }, $roles);

        // CHECK IF ROLE IS ALLOWED
        if (!in_array($userRole, $allowedRoles)) {

            abort(403);

        }

        return $next($request);
    }
}
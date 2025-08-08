<?php

namespace App\Http\Middleware\Core\UserRole;

use App\Enum\User\RolesEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRoleIsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check() || ! Auth::user()->hasRole(RolesEnum::SuperAdmin)) {
            return abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}

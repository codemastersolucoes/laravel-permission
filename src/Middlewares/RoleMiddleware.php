<?php

namespace CodeMaster\Permission\Middlewares;

use Closure;
use Illuminate\Support\Facades\Auth;
use CodeMaster\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     * @throws UnauthorizedException
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!Auth::user()->hasAnyRole($roles)) {
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}

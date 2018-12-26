<?php

namespace CodeMaster\Permission\Middlewares;

use Closure;
use Illuminate\Support\Facades\Auth;
use CodeMaster\Permission\Exceptions\UnauthorizedException;

class RoleOrPermissionMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param $roleOrPermission
     * @return mixed
     * @throws UnauthorizedException
     */
    public function handle($request, Closure $next, $roleOrPermission)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $rolesOrPermissions = is_array($roleOrPermission)
            ? $roleOrPermission
            : explode('|', $roleOrPermission);

        if (!Auth::user()->hasAnyRole($rolesOrPermissions) && !Auth::user()->hasAnyPermission($rolesOrPermissions)) {
            throw UnauthorizedException::forRolesOrPermissions($rolesOrPermissions);
        }

        return $next($request);
    }
}

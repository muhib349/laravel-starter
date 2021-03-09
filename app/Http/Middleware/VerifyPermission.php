<?php

namespace App\Http\Middleware;
use Closure;

class VerifyPermission
{
    public function handle($request, Closure $next, ... $permissions)
    {
        $user = auth()->user();
        foreach($user->roles as $role) {
            foreach($permissions as $permission) {
                if($role->hasPermission($permission)) {
                    return $next($request);
                }
            }

        }

        return response()->json([
            'error' => 'Unauthorized Access'
        ], 401);

    }
}

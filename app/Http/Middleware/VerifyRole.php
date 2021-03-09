<?php

namespace App\Http\Middleware;
use Closure;

class VerifyRole
{
    public function handle($request, Closure $next, ... $roles)
    {

        $user = auth()->user();

        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if($user->roles->contains('name', $role)) {
                return $next($request);
            }

        }

        return response()->json([
            'error' => 'Unauthorized Access'
        ], 401);

    }
}

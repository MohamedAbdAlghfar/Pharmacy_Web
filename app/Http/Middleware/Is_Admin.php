<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class Is_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header("Authorization");

        $user = JWTAuth::parseToken()->toUser($token);

        if (!$user) {
            return response()->json(['user_not_found'], 404); 
        }
        if (in_array($user->role, [0,1])) { // .. Role .. = value ..
            
            return $next($request);
        }
            
        return response()->json(['role_not_allowed'], 403);  
    }
}

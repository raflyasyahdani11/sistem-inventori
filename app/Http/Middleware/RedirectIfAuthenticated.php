<?php

namespace App\Http\Middleware;

use App\Permission\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // switch (Auth::user()->roles)
                $route = RouteServiceProvider::HOME;

                $role = Auth::user()->hasRole(Role::KARYAWAN);

                if ($role) {
                    $route = RouteServiceProvider::PETUGAS_GUDANG_HOME;
                }

                return redirect()->route($route);
            }
        }

        return $next($request);
    }
}

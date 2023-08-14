<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Jobs\CheckExpiredItem;
use Symfony\Component\HttpFoundation\Response;

class CheckExpiredItems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        CheckExpiredItem::dispatch();
        
        return $next($request);
    }
}

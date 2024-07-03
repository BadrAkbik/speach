<?php

namespace App\Http\Middleware;

use App\Classes\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnuserUserHasSubscribtion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->packages()->count() === 0) {
            return ApiResponse::throw(__('api.Please subscribe to a package to use the app'), 402);
        }
        return $next($request);
    }
}

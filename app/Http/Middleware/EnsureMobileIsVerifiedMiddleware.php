<?php

namespace App\Http\Middleware;

use App\Classes\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use App\Interfaces\MustVerifyMobile;


class EnsureMobileIsVerifiedMiddleware
{
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (
            !$request->user() ||
            ($request->user() instanceof MustVerifyMobile &&
                !$request->user()->hasVerifiedMobile())
        ) {
            return ApiResponse::throw(__('auth.Your mobile number is not verified.'), 409);
        }

        return $next($request);
    }
}

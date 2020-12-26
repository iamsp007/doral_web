<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        $path=explode('/',$request->path());
//        if (in_array('referral',$path)){
//            if (! $request->expectsJson()) {
//                return route('referral.showLoginForm');
//            }
//        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

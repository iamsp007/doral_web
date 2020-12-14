<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()){

            if (Auth::user()->hasRole('clinician')){
                return $next($request);
            }elseif (Auth::user()->hasRole('admin')){
                return $next($request);
            }elseif (Auth::user()->hasRole('co-ordinate')){
                return $next($request);
            }else{

                return $next($request);
            }
        }elseif (Auth::guard('referral')->check()){
            $path=explode('/',$request->path());
            if (in_array('referral',$path)){
                return $next($request);
            }

            return redirect(RouteServiceProvider::REFERRAL_HOME);
        }

//        $guards = empty($guards) ? [null] : $guards;
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
//            }
//        }
//
        return $next($request);
    }
}

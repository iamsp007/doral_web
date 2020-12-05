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

            if (Auth::user()->type==='clinician'){
                $path=explode('/',$request->path());
                if (in_array(Auth::user()->type,$path)){
                    return $next($request);
                }
                return redirect(RouteServiceProvider::CLINICIAL_HOME);
            }elseif (Auth::user()->type==='admin'){
                $path=explode('/',$request->path());
                if (in_array(Auth::user()->type,$path)){
                    return $next($request);
                }

                return redirect(RouteServiceProvider::ADMIN_HOME);
            }elseif (Auth::user()->type==='referral'){
                $path=explode('/',$request->path());
                if (in_array(Auth::user()->type,$path)){
                    return $next($request);
                }

                return redirect(RouteServiceProvider::REFERRAL_HOME);
            }else{

                return $next($request);
            }
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

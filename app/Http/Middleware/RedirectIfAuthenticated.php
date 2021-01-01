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
                $path=explode('/',$request->path());
                if (in_array('clinician',$path)){
                    return $next($request);
                }
                return redirect(RouteServiceProvider::CLINICIAL_HOME);
            }elseif (Auth::user()->hasRole('admin')){
                $path=explode('/',$request->path());
                if (in_array('admin',$path)){
                    return $next($request);
                }
                return redirect(RouteServiceProvider::ADMIN_HOME);
            }elseif (Auth::user()->hasRole('co-ordinator')){
                $path=explode('/',$request->path());
                if (in_array('co-ordinate',$path)){
                    return $next($request);
                }
                return redirect(RouteServiceProvider::COORDINATE_HOME);
            }elseif (Auth::user()->hasRole('supervisor')){
                $path=explode('/',$request->path());
                if (in_array('supervisor',$path)){
                    return $next($request);
                }
                return redirect(RouteServiceProvider::SUPERVISOR_HOME);
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

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value =Session::get('access_level');
        if($value == "Admin"){
            return $next($request);
        }else {
            Session::put('url', url()->previous());
            return redirect(route('error'));
        }
    }
}

<?php

namespace App\Http\Middleware;

use http\Env\Request;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Support\Facades\URL;
class CheckUser
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
        $value =Session::get('admin_id');

        if($value>0){
            return $next($request);
        }else {
            Session::put('url', URL::current());
            return redirect('/admin');
        }

    }
}

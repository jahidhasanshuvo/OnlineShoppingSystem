<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\URL;

class CheckCustomer
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
        $value =Session::get('customer_id');

        if($value>0){
            return $next($request);
        }else {
            Session::put('url', URL::current());
            return redirect('/login');
        }
    }
}

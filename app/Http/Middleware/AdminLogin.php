<?php

namespace App\Http\Middleware;
use Illuminate\support\Facades\Session;
use Closure;

class AdminLogin
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
         if(Session::has('username') ){
            return $next($request);
        }
        else{
            return redirect('dangnhap ');
         }
    }
}

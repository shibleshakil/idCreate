<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Session::has('lang')){
            \App::setlocale(\Session::get('lang'));            
        }elseif (\Cookie::has('lang')) {
            \App::setlocale(\Cookie::get('lang'));
        }
    
        return $next($request);
    }
}

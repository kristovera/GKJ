<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class level
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
        if (\Auth::user() &&  \Auth::user()->level == 0) {
             return $next($request);
        }

        return redirect('home')->with('error','Opps, You\'re not Admin');
    }
}

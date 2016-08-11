<?php

namespace Panel\Http\Middleware;

use Closure;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$method)
    {
        if(!$request->user()->$method()){
            abort(403);
        }
        return $next($request);
    }
}

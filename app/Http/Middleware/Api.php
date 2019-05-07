<?php

namespace App\Http\Middleware;

use Closure;

class Api
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

        //\response()->header("Content-Type","application/json");
//        if($request->header("token")!==env("APP_KEY")){
//
//        }

        return $next($request);
    }
}

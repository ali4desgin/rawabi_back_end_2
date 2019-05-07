<?php

namespace App\Http\Middleware\BackEnd;

use Closure;

class Authed
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
        if(!$request->session()->has("manger_id")){
            return redirect(route("admin_login"));
        }

        return $next($request);
    }
}

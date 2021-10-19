<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccesApi
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
        return $next($request)
        ->header("Access-Control-Allow-Origin", "https://playinone.000webhostapp.com")
        ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
        ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization, application/json");
    }
}

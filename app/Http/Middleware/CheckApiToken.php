<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiToken
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
        if(!empty(trim($request->input('api_token')))){

            if(strcmp(trim($request->input('api_token')), env('API_TOKEN')) == 0){
                return $next($request);
            }
        }
            return response()->json('Invalid Token', 401);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PruebaRedireccionView
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
        $response = $next($request);
        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Fri, 12 Mar 1990 15:56:24 GMT')
            ->header('Last-Modified','Fri, 12 Mar 1990 15:56:24 GMT');
    }
}

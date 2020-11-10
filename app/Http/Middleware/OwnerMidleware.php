<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class OwnerMidleware
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
        if ($request->user() && $request->user()->id_role !=2) {
            return new Response(view('404'));
        }

        return $next($request);
    }
}

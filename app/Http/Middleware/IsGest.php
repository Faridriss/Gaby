<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGest
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
        if($request->user()->isGest() || $request->user()->isAdmin() ) {
            return $next($request);
        } else {
             abort(403,'Vous n êtes pas gestionnaire');
        }
    }
}
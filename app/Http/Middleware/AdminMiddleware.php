<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
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
        if(!Auth::user()->roles->contains('name', 'admin') && !Auth::user()->roles->contains('name', 'hrd'))
        {    
            return redirect()->back();
        }
        return $next($request);
    }
}

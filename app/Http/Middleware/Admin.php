<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (($request->user()->role->name != "admin")) {
            session()->flash('flash_error', 'You have no permissions for this!');
            return redirect()->back();
        }
        return $next($request);
    }
}

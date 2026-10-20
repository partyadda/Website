<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AllRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        // if (Auth::check()) {
        //     return $next($request);
        // }
        // else{
        //     return redirect('/');
        // }
        // new code
        if (auth()->check()) {
            return $next($request);
        }
        else{
            return redirect('/');
        }
        return redirect('/admin/dashboard');
    }
}

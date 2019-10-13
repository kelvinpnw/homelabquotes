<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check if user is logged in
        if (Auth::check()) {
            //check if user is admin
            if (Auth::user()->admin == 1) {
                return $next($request);
            }else{
                return Redirect('/account');
            }
        }else{
            abort(403);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrossCheck
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
        $path = $request->path();
        if(Auth::user()->status == 2 && $path == 'dashboard')
            return $next($request);
        else if(Auth::user()->status == 1 && $path == 'demonlord')
            return $next($request);
        else{
            if(Auth::user()->status == 1)
                return redirect('/demonlord');
            else
                return redirect('dashboard');
        }
    }
}

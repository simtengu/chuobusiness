<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class SuperAdmin
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
       
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            return $next($request);
  
        }else{
            return redirect()->route('home');
        }

    }
}

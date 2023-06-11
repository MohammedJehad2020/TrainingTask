<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         
         if($request->user() && $request->user()->status == 'Disabled'){
            //  auth()->logout();
             abort(403, 'Your status is not active anymore.');
            //  return redirect()->route('login');
        }
        return $next($request);
    }
}

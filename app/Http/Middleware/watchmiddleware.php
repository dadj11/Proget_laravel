<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class watchmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        if (Auth::user()){
           return $next($request);
        }
       // dd(Auth::user());
    //$request['secret']=12345678;
    // dump($request);
    //     dd($next);
       // return $next($request);
       return to_route('auth.login');
    }
}

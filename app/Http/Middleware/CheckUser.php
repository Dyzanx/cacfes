<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        if(Auth::user()->type == 'admin'){
            return $next($request);
        }else{
            session()->flush();
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}

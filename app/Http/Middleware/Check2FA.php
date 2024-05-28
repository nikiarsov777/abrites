<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Check2FA

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
        if (!Session::has('user_2fa')) {
            return redirect()->route('2fa.index');
        }
        if(!Session::has('user_id')) {
            Session::forget('user_2fa');
            return redirect()->to('/users/logout');
        }

        return $next($request);
    }
}

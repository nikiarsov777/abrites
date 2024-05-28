<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\RateLimiter;

abstract class Controller
{


    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }
        Cookie::queue('banned', 1, 60);
        return redirect('/')->with('status', 'IP address banned for one hour. Too many login attempts.');
    }
    
}

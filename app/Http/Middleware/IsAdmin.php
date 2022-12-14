<?php

namespace App\Http\Middleware;

use App\Exceptions\NotAdminErrorException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()['role'] != 'admin') {
            throw new NotAdminErrorException();
        }
        return $next($request);
    }
}

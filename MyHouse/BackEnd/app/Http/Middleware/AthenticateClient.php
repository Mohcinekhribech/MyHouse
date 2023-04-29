<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateClient
{
    public function handle(Request $request, Closure $next)
    {
        return 'ijijtgitj';
        if(Auth::user()->role == 'client'){
            return $next($request);
        }
        return 'walo';
    }
}

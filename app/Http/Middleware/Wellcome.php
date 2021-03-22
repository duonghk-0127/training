<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Wellcome
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
        if(empty($_SESSION['custommer'])) return redirect('/');
        return $next($request);
    }
}

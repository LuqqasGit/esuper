<?php

namespace App\Http\Middleware;

use Closure;
use User;

class Admin
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
      if (!\Auth::check()) {
        abort(404);
      } else {
        if (\Auth::user()->type != 2) {
          abort(404);
        }
      }
      return $next($request);
    }
}

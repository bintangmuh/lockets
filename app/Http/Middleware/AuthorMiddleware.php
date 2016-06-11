<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthorMiddleware
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
        if (Auth::check()) {
          if (Auth::user()->id <> $request->id) {
            return redirect('/unauthorized');
          }
        } else {
          return redirect('/login');
        }
        return $next($request);
    }
}

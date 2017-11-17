<?php

namespace reportes\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class AuthenticateOnceWithBasicAuth
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
       return Auth::onceBasic() ?: $next($request);
    }
}

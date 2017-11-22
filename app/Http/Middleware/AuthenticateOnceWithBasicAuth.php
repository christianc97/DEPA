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
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next, $guard = null)
    {
       //return Auth::onceBasic($guard) ?: $next($request);
       return $this->auth->guard($guard)->onceBasic() ?: $next($request);
    }
}


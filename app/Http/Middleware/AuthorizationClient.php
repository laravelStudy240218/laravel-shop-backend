<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->Authentication($request); //인증
        return $this->Authorization($request,$next); //인가
    }

    protected function Authentication(Request $request)
    {

    }

    protected function Authorization(Request $request, Closure $closure) : Response
    {

        return $this->next($request,$closure);
    }

    protected function next(Request $request, Closure $next) : Response
    {
        return $next($request);
    }
}

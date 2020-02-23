<?php

namespace App\Http\Middleware;

use App\Http\Helpers\JwtHelper;
use Closure;
use Illuminate\Auth\AuthenticationException;

class Jwt
{
    //JwtHelper::issue(10,'asd@asd.asd','test')
    //eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzUxMiIsImp0aSI6IjdzZ253OTIwYXNscyJ9.eyJqdGkiOiI3c2dudzkyMGFzbHMiLCJpc3MiOiJjYXRhbG9nIiwiaWF0IjoxMCwiYXVkIjoiYXNkQGFzZC5hc2QiLCJzdWIiOiJ0ZXN0In0.
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header('email') || !$request->header('token')) {
            throw new AuthenticationException();
        }

        if (!JwtHelper::validate($request->header('email'), $request->header('token'))) {
            throw new AuthenticationException();
        }

        return $next($request);
    }
}

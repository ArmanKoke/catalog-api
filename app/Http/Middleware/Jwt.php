<?php

namespace App\Http\Middleware;

use Closure;

class Jwt
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //todo add something after authorization happens in auth
        return $next($request);
    }
}

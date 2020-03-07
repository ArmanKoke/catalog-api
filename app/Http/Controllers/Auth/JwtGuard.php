<?php
namespace App\Http\Controllers\Auth;

use App\Http\Helpers\JwtHelper;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class JwtGuard
{
    use GuardHelpers;

    protected $request;
    protected $token;

    public function __construct(UserProvider $provider, Request $request, $key = 'token')
    {
        $this->provider = $provider;
        $this->request = $request;
        $this->token = $request->bearerToken() ?? $key;
    }
    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if(!JwtHelper::verify($this->token))
        {
            return;
        }

        return $this->user = $this->provider->retrieveByCredentials(['email' => JwtHelper::getAud($this->token)]);
    }
}

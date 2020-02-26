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
    protected $key;

    public function __construct(UserProvider $provider, Request $request, $key = 'token')
    {
        $this->key = $key;
        $this->request = $request;
        $this->provider = $provider;
    }
    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if(!JwtHelper::validate($this->token()))
        {
            return;
        }

        return $this->user = $this->provider->retrieveByCredentials(['email' => JwtHelper::getAud($this->token())]);
    }

    public function token()
    {
        return $this->request->bearerToken();
    }
}

<?php
namespace App\Http\Controllers\Auth;

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
        $this->user = $this->provider->retrieveByCredentials(['email' => $this->request->header('email')]);

        return $this->user;
    }
}

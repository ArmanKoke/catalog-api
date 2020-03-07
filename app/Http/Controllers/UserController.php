<?php

namespace App\Http\Controllers;

use App\Http\Helpers\JwtHelper;
use App\Http\Requests\TokenRequest;
use App\Http\Requests\UserDetachFromRoleRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request):UserResource //make request validation for user
    {
        $user = User::firstOrNew(['email' => $request->email]);
        $user->name = $request->name;
        $user->save();

        $user->roles()->attach($request->role_id);

        return new UserResource($user);
    }

    public function issueToken(TokenRequest $request)
    {
        return response()->json([
            'token' => JwtHelper::issue($request->aud, $request->sub, $request->exp)
        ]);
    }

    public function show(User $user):UserResource
    {
        return new UserResource($user->load('roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

        return $user->load('roles');
    }

    public function detachFromRole(UserDetachFromRoleRequest $request)
    {
        $user = User::find($request->user_id);
        $user->roles()->detach($request->role_id);

        return $user->load('roles');
    }

    public function destroy(User $user): Response
    {
        $user->delete();

        return response(null, 204);
    }
}

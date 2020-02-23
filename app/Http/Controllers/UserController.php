<?php

namespace App\Http\Controllers;

use App\Http\Helpers\JwtHelper;
use App\Http\Resources\UserResource;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::firstOrNew(['email' => $request->email]);
        $user->name = $request->name;
        $user->password = Hash::make($request->getPassword());
        $user->save();

        return new UserResource($user);
    }

    public function issueToken(Request $request)
    {
        $token = Token::firstOrNew(['aud' => $request->aud]); //todo validate email?
        $token->iat = $request->iat;
        $token->sub = $request->sub ?? null;
        $token->exp = $request->exp ?? 0;
        $token->save;

        return response()->json([
            'token' => JwtHelper::issue($request->aud, $request->iat, $request->sub, $request->exp)
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name ?? $user->name;
        $user->password = Hash::make($request->getPassword()) ?? $user->password;
        $user->save();

        return $user;
    }

    //todo detach from role
//    public function detachFromCategory(ItemDetachFromCategoryRequest $request)
//    {
//        $item = Item::find($request->item_id);
//        $item->categories()->detach($request->category_id);
//
//        return $item->load('categories');
//    }

    public function destroy(User $user)
    {
        $user->delete();

        return response(null, 204);
    }
}

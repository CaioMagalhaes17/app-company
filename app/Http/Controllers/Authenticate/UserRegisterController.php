<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Requests\Authenticate\UserRegisterRequest;
use App\Models\User;

class UserRegisterController
{
    public function userRegister(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }
}

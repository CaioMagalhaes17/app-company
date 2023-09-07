<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Requests\Authenticate\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class UserLoginController {
    public function userLogin(UserLoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['token' => $token]);
        }
    
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
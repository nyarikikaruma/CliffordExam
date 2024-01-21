<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

   public function login(LoginRequest $request) {
    $attributes = ['email' => $request->email, 'password' => $request->password];
    if (!Auth::attempt($attributes)) {
        return response(['message' => __('auth.failed')], 422);
    }

    $authUser = Auth::user();

    $user = User::find($authUser->id);
    return [
        'user' => $user,
        'token' => $user->createToken('secret')->plainTextToken
    ];
    }


   public function logout(Request $request) {
       $user = Auth::user();
       $user->tokens()->delete();
       return response()->json(['Success']);

}
}

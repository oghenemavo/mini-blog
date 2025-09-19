<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(StoreAccountCreateRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Account Created',
        ]);
    }

    public function login(StoreLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->name . '_auth_token')->plainTextToken
        ]);
    }

}

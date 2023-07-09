<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $params = $request->only(['email', 'password']);
            if (Auth::attempt($params)) {
                $user = Auth::user();
                $token = $user->createToken($user->email);
                return response()->json(['message' => 'Credentials verified successfully.', 'token' => $token->plainTextToken], 200);
            } else {
                return response()->json(['error' => 'The credentials provided does not match with the system.'], 403);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}

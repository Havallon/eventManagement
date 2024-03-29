<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public static function login(Request $request)
    {
        $credentials = $request->only([
            "email",
            "password",
            "device_name"
        ]);

        $user = User::where("email", $credentials["email"])->first();
        if (!$user) {
            throw ValidationException::withMessages([
                "email"=> ['The provided credentials are incorret']
            ]);
        }

        $password_check = Hash::check($credentials["password"], $user->password);
        if (!$password_check) {
            throw ValidationException::withMessages([
                "email"=> ['The provided credentials are incorret']
            ]);
        }
        
        $user->tokens()->delete();
        $token = $user->createToken($credentials["device_name"])->plainTextToken;
        return ['token'=> $token];
    }
    public static function logot(User $user){
        $user->tokens()->delete();
        return ['message'=>'success'];
    } 
}
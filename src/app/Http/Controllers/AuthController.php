<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $token = AuthService::login($request);
        return (new AuthResource($token));
    }
    public function logout(Request $request)
    {
        $msg = AuthService::logot($request->user());
        return $msg;
    }
}

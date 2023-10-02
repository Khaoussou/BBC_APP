<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\Format;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use Format;
    public function register(UserRequest $request)
    {
        $user = User::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => $request->password,
            "succursale_id" => 1
        ]);
        return response($user, Response::HTTP_CREATED);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("name", "password"))) {
            return $this->response(Response::HTTP_UNAUTHORIZED, "Invalid credentials", []);
        }
        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;
        $cookie = cookie("token", $token, 24 * 60);
        
        return response([
            "user" => $user->name,
            "succursale" => $user->succursale->nom,
            "token" => $token
        ])->withCookie($cookie);
    }
    public function user(Request $request)
    {
        return $request->user();
    }
    public function logout()
    {
        Auth::guard('sanctum')->user()->tokens()->delete();
    }
}

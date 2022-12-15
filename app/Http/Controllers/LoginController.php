<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
        $credentials = [
            'email'=> $request->input('email'),
            'password' => $request->input('password')
        ];

        if (!Auth::attempt($credentials)) {
            return "Bad credentials";
        }

        $user = User::where('email', $request->input('email'))->first();
        return $user->createToken("presa")->plainTextToken;
    }
}

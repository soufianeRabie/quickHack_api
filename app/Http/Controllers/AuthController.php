<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $data = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ];

        if(!auth()->attempt($data))
        {
            return response()->json('Unauthorized' ,401);
        }
        $tokenName = config('app.name' , 'TOKEN_NAME');
        $expireAt = Carbon::now()->addDay();
        $token = $request->user()->createToken($tokenName,['*'], $expireAt);
        return response()->json([
            'token'=>$token->plainTextToken,
            'user'=>auth()->user(),
            'expire'=>$expireAt
        ]);
    }
}

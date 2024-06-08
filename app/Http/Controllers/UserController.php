<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function init()
    {
        $user = auth()->user();
        return response()->json(['user' => $user]);
    }

    public function update(Request $request ,User $user)
    {
        $fillable = $request->post();
        $user->fill($fillable);
        $user->save();

        return response()->json(['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(true);
    }

}

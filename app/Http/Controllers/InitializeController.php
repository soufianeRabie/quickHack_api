<?php

namespace App\Http\Controllers;

use App\Models\table1;
use App\Models\User;
use Illuminate\Http\Request;

class InitializeController extends Controller
{
    public function init ()
    {
        $table1s = table1::all();
        $users = User::all();

        return response()->json(['table1s' => $table1s, 'users' => $users]);
    }
}

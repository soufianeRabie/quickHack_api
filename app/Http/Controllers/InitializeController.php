<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\table1;
use App\Models\User;
use Illuminate\Http\Request;

class InitializeController extends Controller
{
    public function init ()
    {
        $pharmacies = Pharmacy::all();
        $users = User::all();

        return response()->json(['pharmacies' => $pharmacies, 'users' => $users]);
    }
}

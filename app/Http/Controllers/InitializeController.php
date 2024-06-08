<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Pharmacy;
use App\Models\table1;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Event\Event;

class InitializeController extends Controller
{
    public function init ()
    {
        $pharmacies = Pharmacy::all();
        $users = User::all();
        $medicaments = Medicament::all();
        $events = \App\Models\Event::all();
        return response()->json(['events'=>$events ,'pharmacies' => $pharmacies, 'users' => $users , 'medicaments' =>$medicaments]);

    }
}

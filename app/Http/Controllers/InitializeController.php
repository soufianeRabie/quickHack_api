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
    public function init()
    {
        $pharmacies = Pharmacy::all();
        $users = User::all();
        $events = \App\Models\Event::all();
        $lignes_budgetaire = \App\Models\LigneBudgetaire::all();
        $dep_marche = \App\Models\DepMarche::all();
        $expense_types = \App\Models\ExpenseType::all();

        return response()->json([
            'events' => $events,
            'pharmacies' => $pharmacies,
            'users' => $users,
            'lignes_budgetaire' => $lignes_budgetaire,
            'dep_marche' => $dep_marche,
            'expense_types' => $expense_types,
        ]);
    }

}

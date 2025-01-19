<?php

namespace App\Http\Controllers;

use App\Models\LigneBudgetairePlafond;
use Illuminate\Http\Request;

class LigneBudgetairePlafondController extends Controller
{
    public function index($id)
    {
        $plafonds = LigneBudgetairePlafond::where('ligne_budgetaire_id', $id)->get();

        return response()->json($plafonds);
    }

    // Add a monthly plafond
    public function store(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
            'plafond' => 'required|numeric|min:0',
        ]);

        $plafond = LigneBudgetairePlafond::create([
            'ligne_budgetaire_id' => $id,
            'year' => $request->year,
            'month' => $request->month,
            'plafond' => $request->plafond,
        ]);

        return response()->json(['message' => 'Plafond added successfully', 'data' => $plafond]);
    }

    // Update a monthly plafond
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
            'plafond' => 'required|numeric|min:0',
        ]);

        $plafond = LigneBudgetairePlafond::where('ligne_budgetaire_id', $id)
            ->where('year', $request->year)
            ->where('month', $request->month)
            ->firstOrFail();

        $plafond->update(['plafond' => $request->plafond]);

        return response()->json(['message' => 'Plafond updated successfully', 'data' => $plafond]);
    }
}

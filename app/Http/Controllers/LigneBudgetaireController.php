<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LigneBudgetaireController extends Controller
{
    public function index()
    {
        $ligneBudgetaires = LigneBudgetaire::with('expenses')->get();

        return response()->json([
            'success' => true,
            'data' => $ligneBudgetaires
        ], 200);
    }

    /**
     * Get a single budget line with its related expenses.
     */
    public function show($id)
    {
        $ligneBudgetaire = LigneBudgetaire::with('expenses')->find($id);

        if (!$ligneBudgetaire) {
            return response()->json([
                'success' => false,
                'message' => 'Budget line not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $ligneBudgetaire
        ], 200);
    }
}

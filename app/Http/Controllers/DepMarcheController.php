<?php

namespace App\Http\Controllers;

use App\Models\DepMarche;
use Illuminate\Http\Request;

class DepMarcheController extends Controller
{
    public function index()
    {
        $depMarche = DepMarche::with('budgetLine')->get();

        return response()->json([
            'success' => true,
            'data' => $depMarche
        ], 200);
    }

    /**
     * Get a single expense by ID.
     */
    public function show($id)
    {
        $depMarche = DepMarche::with('budgetLine')->find($id);

        if (!$depMarche) {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $depMarche
        ], 200);
    }

    /**
     * Get expenses filtered by criteria (date range, expense type, etc.).
     */
    public function filter(Request $request)
    {
        $query = DepMarche::query();

        if ($request->has('expense_type')) {
            $query->where('expense_type', $request->expense_type);
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('expense_date', [$request->start_date, $request->end_date]);
        }

        $filteredExpenses = $query->with('budgetLine')->get();

        return response()->json([
            'success' => true,
            'data' => $filteredExpenses
        ], 200);
    }
}

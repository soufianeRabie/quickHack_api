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


    public function store(Request $request)
    {
        // Assuming the request contains an array of data
        $depMarchesData = $request->input('dep_marches'); // Get the array of depMarche data

        $createdDepMarches = [];

        foreach ($depMarchesData as $data) {
            // Create each DepMarche entry
            $depMarche = DepMarche::create([
                'ligne_budgetaire_id' => $data['ligne_budgetaire_id'],
                'expense_type' => $data['expense_type'],
                'reference' => $data['reference'],
                'amount' => $data['amount'],
                'expense_date' => $data['expense_date'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'payment_method' => $data['payment_method'],
                'approval_date' => $data['approval_date'],
                'status' => $data['status'] ?? 'pending',
                'details' => $data['details'],
            ]);

            // Store the created DepMarche in the array
            $createdDepMarches[] = $depMarche;
        }

        // Return success response with the created depMarches
        return response()->json(['dep_marches' => $createdDepMarches], 201);
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

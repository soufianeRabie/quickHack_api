<?php

namespace App\Http\Controllers;

use App\Models\LigneBudgetaire;
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
    public function store(Request $request){
        $formFields=[
            'name'=>$request->name,
            'description'=>$request->description,
            'expense_type'=>$request->expense_type,
            'annual_budget'=>$request->annual_budget,
            'spent_amount'=>$request->spent_amount,
            'year'=>$request->year,
        ];
        LigneBudgetaire::create($formFields);
    }
    public function update($id,Request $request){
        $formFields=[
            'name'=>$request->name,
            'description'=>$request->description,
            'expense_type'=>$request->expense_type,
            'annual_budget'=>$request->annual_budget,
            'spent_amount'=>$request->spent_amount,
            'year'=>$request->year,
        ];
        $ligneBudgetaire=LigneBudgetaire::findOrFail($id);
        $ligneBudgetaire->fill($formFields)->save();

    }
    public function destroy( $id){
        $ligneBudgetaire=LigneBudgetaire::findOrFail($id);
        $ligneBudgetaire->delete();
    }
}

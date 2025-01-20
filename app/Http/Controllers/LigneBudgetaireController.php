<?php

namespace App\Http\Controllers;

use App\Models\LigneBudgetaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LigneBudgetaireController extends Controller
{


    public function handleChat(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'question' => 'required|string',
        ]);

        $lignesBudgetaire = LigneBudgetaire::with('expenses')->get();

        // Prepare the data to send to Gemini AI
        $expenseData = $lignesBudgetaire->map(function ($ligne) {
            return [
                'name' => $ligne->name,
                'description' => $ligne->description,
                'annual_budget' => $ligne->annual_budget,
                'spent_amount' => $ligne->expenses->sum('amount'),
                'year' => $ligne->year,
                'expenses_details' => $ligne->expenses->map(function ($expense) {
                    return [
                        'reference' => $expense->reference,
                        'amount' => $expense->amount,
                        'expense_date' => $expense->expense_date,
                        'payment_method' => $expense->payment_method,
                        'status' => $expense->status,
                        'details' => $expense->details,
                    ];
                }),
            ];
        });
        $question = $request->get('question' );

        // Call the Gemini API using the private method
        $response = $this->sendToGemini($expenseData, $question);

            return response()->json($response['candidates'][0]['content']['parts'][0]['text']);


//        return response()->json(['error' => 'Unable to process your request.'], 500);
    }

    public function analyzeExpenses()
    {
        // Fetching the budget lines along with their expenses
        $lignesBudgetaire = LigneBudgetaire::with('expenses')->get();

        // Prepare the data to send to Gemini AI
        $expenseData = $lignesBudgetaire->map(function ($ligne) {
            return [
                'name' => $ligne->name,
                'description' => $ligne->description,
                'annual_budget' => $ligne->annual_budget,
                'spent_amount' => $ligne->expenses->sum('amount'),
                'year' => $ligne->year,
                'expenses_details' => $ligne->expenses->map(function ($expense) {
                    return [
                        'reference' => $expense->reference,
                        'amount' => $expense->amount,
                        'expense_date' => $expense->expense_date,
                        'payment_method' => $expense->payment_method,
                        'status' => $expense->status,
                        'details' => $expense->details,
                    ];
                }),
            ];
        });

        // Preparing the question for Gemini AI
        $question = "Can you analyze these expenses and identify any risks in the 'lignes_budgetaire'? Also, provide advice on how to manage them and suggest potential improvements .";
        $response = $this->sendToGemini($expenseData, $question);

        // Return the response (you can return it to the view or a JSON response)
        return response()->json($response['candidates'][0]['content']['parts'][0]['text']);

    }

    private function sendToGemini($expenseData, $question)
    {
        // Sending request to Gemini API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withoutVerifying()  // Disable SSL verification if necessary
            ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . env('GEMINI_API_KEY'), [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => json_encode([
                                'expenses' => $expenseData,
                                'question' => $question,
                                'currency'=>'DH'
                            ], JSON_THROW_ON_ERROR)],
                        ]
                    ]
                ]
            ]);

        return $response->json();
    }

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

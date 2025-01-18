<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepMarche extends Model
{
    use HasFactory;

    protected $fillable = [
        'ligne_budgetaire_id', 'expense_type', 'reference', 'amount',
        'expense_date', 'start_date', 'end_date', 'payment_method',
        'approval_date', 'status', 'details'
    ];

    public function budgetLine()
    {
        return $this->belongsTo(LigneBudgetaire::class, 'ligne_budgetaire_id');
    }

    public function hasDates()
    {
        return in_array($this->expense_type, ['CCF', 'CCV']);
    }
}

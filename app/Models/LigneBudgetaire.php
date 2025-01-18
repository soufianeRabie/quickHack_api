<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBudgetaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'expense_type', 'annual_budget', 'spent_amount', 'year'
    ];

    public function expenses()
    {
        return $this->hasMany(DepMarche::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBudgetairePlafond extends Model
{
    use HasFactory;

    protected $fillable = ['ligne_budgetaire_id', 'year', 'month', 'plafond'];

    public function ligneBudgetaire()
    {
        return $this->belongsTo(LigneBudgetaire::class);
    }
}

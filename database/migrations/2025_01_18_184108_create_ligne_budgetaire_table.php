<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ligne_budgetaires', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the budget line
            $table->text('description')->nullable(); // Description of the budget line
            $table->string('expense_type'); // E.g., Investment, Electricity, Water
            $table->decimal('annual_budget', 15, 2); // Total annual budget
            $table->decimal('spent_amount', 15, 2)->default(0); // Amount spent
            $table->year('year'); // Year of the budget
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_budgetaire');
    }
};

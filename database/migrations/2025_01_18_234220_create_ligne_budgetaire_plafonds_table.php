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
        Schema::create('ligne_budgetaire_plafonds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ligne_budgetaire_id'); // Foreign key to the ligne_budgetaires table
            $table->integer('year'); // Year for the plafond
            $table->integer('month'); // Month for the plafond (1 for January, 12 for December)
            $table->decimal('plafond', 10, 2); // Monthly plafond value
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('ligne_budgetaire_id')
                ->references('id')
                ->on('ligne_budgetaires')
                ->onDelete('cascade');

            // Ensure unique combination of ligne_budgetaire_id, year, and month
            $table->unique(['ligne_budgetaire_id', 'year', 'month']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_budgetaire_plafonds');
    }
};

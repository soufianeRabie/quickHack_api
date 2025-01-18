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
        Schema::create('dep_marches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ligne_budgetaire_id')->constrained('ligne_budgetaire')->onDelete('cascade'); // Linked to budget line
            $table->string('expense_type'); // E.g., CCF, CCV, Bon de Commande
            $table->string('reference')->unique(); // Expense reference
            $table->decimal('amount', 15, 2); // Expense amount
            $table->date('expense_date'); // Date of expense
            $table->date('start_date')->nullable(); // Start date for CCF/CCV
            $table->date('end_date')->nullable(); // End date for CCF/CCV
            $table->string('payment_method')->nullable(); // E.g., Bank Transfer, Cash
            $table->date('approval_date')->nullable(); // Approval date
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Approval status
            $table->text('details')->nullable(); // Additional details
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dep_marche');
    }
};

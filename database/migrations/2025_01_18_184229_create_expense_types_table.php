<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expense_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the expense type (e.g., Investment, Electricity, Water, etc.)
            $table->text('description')->nullable(); // Description of the expense type (optional)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_types');
    }
};

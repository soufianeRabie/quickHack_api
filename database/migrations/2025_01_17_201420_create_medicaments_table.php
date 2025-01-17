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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id(); // Equivalent to bigint unsigned auto_increment primary key
            $table->string('name', 255); // Equivalent to varchar(255)
            $table->decimal('price', 10, 2); // Equivalent to decimal(10, 2)
            $table->string('prescreption', 255); // Equivalent to varchar(255)
            $table->timestamps(0); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};

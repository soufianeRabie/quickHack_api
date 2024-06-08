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
        Schema::create('table1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('att1');
            $table->string('att2');
            $table->string('att3');
            $table->string('att4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table1s');
    }
};

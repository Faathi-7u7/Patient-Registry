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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('street'); // Street name
            $table->string('house'); // house name
            $table->foreignId('island_id')->constrained()->onDelete('cascade'); // Foreign Key to islands
            $table->timestamps(); // Created at and Updated at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
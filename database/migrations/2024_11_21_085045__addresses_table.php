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
            $table->id(); // Unique identifier for each address
            $table->string('street'); // Street address
            $table->string('city'); // City name
            $table->string('state'); // State name
            $table->foreignId('island_id')->constrained()->onDelete('cascade'); // Linking to the islands table
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

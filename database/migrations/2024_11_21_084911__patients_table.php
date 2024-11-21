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
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Unique identifier for each patient
            $table->string('name'); // Name of the patient
            $table->date('dob'); // Date of birth
            $table->string('national_id')->unique(); // Unique national ID
            $table->foreignId('address_id')->constrained()->onDelete('cascade'); // Linking to the addresses table
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

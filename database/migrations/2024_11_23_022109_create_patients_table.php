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
            $table->id(); // Primary Key
            $table->string('name'); // Patient name
            $table->date('dob'); // Date of birth
            $table->string('national_id',7)->unique(); // National ID, unique for each patient
            $table->foreignId('address_id')->constrained()->onDelete('cascade'); // Foreign Key to addresses
            $table->timestamps(); // Created at and Updated at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

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
        Schema::create('islands', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('atoll'); // Atoll of the island
            $table->string('name'); // Name of the island
            $table->timestamps(); // Created at and Updated at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islands');
    }
};

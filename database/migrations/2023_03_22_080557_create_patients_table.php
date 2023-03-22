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
            $table->smallIncrements('id');
            $table->string('name', 50);
            $table->smallInteger('age');
            $table->tinyInteger('sex');
            $table->date('date_of_birth');
            $table->string('contact_number', 50);
            $table->string('chief_complaint', 50);
            $table->string('medical_history', 50);
            $table->string('allergies', 50);
            $table->timestamps();
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

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
        Schema::create('health_workers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 50);
            $table->smallInteger('age');
            $table->tinyInteger('sex');
            $table->date('date_of_birth');
            $table->string('contact_number', 50);
            $table->string('position', 50);
            $table->string('work_experience', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_workers');
    }
};

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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('patient_id')->unsigned();
            $table->smallInteger('health_worker_id')->unsigned();
            $table->date('date_of_consultation');
            $table->string('reason_for_consultation', 150);
            $table->string('diagnosis', 150);
            $table->string('prescription', 150);
            $table->date('follow_up_appointment')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('health_worker_id')
                ->references('id')
                ->on('health_workers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};

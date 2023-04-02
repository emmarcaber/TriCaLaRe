<?php

namespace Database\Factories;

use App\Models\HealthWorker;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $patients = Patient::all()->pluck('id')->toArray();
        $health_workers = HealthWorker::all()->pluck('id')->toArray();
        $fake_date = fake()->dateTimeInInterval('-10 years', '-3 years');

        return [
            'patient_id' => fake()->randomElement($patients),
            'health_worker_id' => fake()->randomElement($health_workers),
            'date_of_consultation' => $fake_date,
            'reason_for_consultation' => fake()->randomElement(['Fever, cough and colds', 'Stomach pain', 'Urinary Tract Infection', 'Diabetes check-up', 'Toothache', 'Prenatal check-up', 'Hypertension check-up', 'Blood test', 'Skin rash', 'Annual Physical Exam']),
            'diagnosis' => fake()->randomElement(['Upper respiratory tract infection', 'Oral rehydration solution, antibiotics and antacids', 'Urinary tract infection', 'Type 2 diabetes', 'Dental Caries', 'Normal Pregnancy', 'Hypertension', 'Normal Blood Results', 'Allergic Reaction', 'Normal Physical Examination']),
            'prescription' => fake()->randomElement(['Paracetamol, Vitamin C and cough syrup', 'Oral rehydration solution,  antibiotics and antacids', 'Antibiotics and pain reliever', 'Oral hypoglemic agent and diet plan', 'Antibiotics and tooth extraction', 'Prenatal vitamins and supplements', 'Anti-hypertensive medication and lifestyle modifications', 'None', 'Antihistamines and topical cortesoid']),
            'follow_up_appointment' => fake()->dateTimeInInterval($fake_date, '+7 days')
        ];
    }
}

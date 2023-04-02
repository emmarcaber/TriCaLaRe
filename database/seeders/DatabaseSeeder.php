<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HealthWorker;
use App\Models\MedicalEquipment;
use App\Models\MedicalRecord;
use App\Models\MedicalSupply;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Uncomment the code below to seed
        // the database with several fake patients
        Patient::factory(10)->create();

        // Uncomment the code below to seed
        // the database with several fake health workers
        HealthWorker::factory(10)->create();

        // Uncomment the code below to seed
        // the database with several fake medical records
        MedicalRecord::factory(10)->create();
        
        // Uncomment the code below to seed
        // the database with several fake medical equipments
        MedicalEquipment::factory(10)->create();

        // Uncomment the code below to seed
        // the database with several fake medical supplies
        MedicalSupply::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

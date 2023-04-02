<?php

namespace Database\Factories;

use App\Models\HealthWorker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalEquipment>
 */
class MedicalEquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $health_workers = HealthWorker::all()->pluck('id')->toArray();

        return [
            'name' => fake()->randomElement([
                'Blood Pressure Monitor', 'Stethoscope',
                'Otoscope', 'Thermometer', 'Nebulizer', 'Glucometer',
                'ECG Machine', 'Oxygen Tank', 'Sphygmomanometer',
                'Weighing Scale'
            ]),
            'brand' => fake()->randomElement([
                'Omron', '3M Littman', 'Welch Allyn' , 'Braun',
                'Philips', 'Accu-Chek', 'GE Healthcare',
                'Catalina Cylinders', 'A&D Medical', 'Tanita'
            ]),
            'model' => fake()->randomElement([
                'Classic III', '25020A', 'ThermoScan 7',
                'Innospire Go', 'BP742N', 'Guide', 'MAC 5500 HD',
                'UA-767F', 'HD-351BT'
            ]),
            'quantity' => fake()->numberBetween(1, 5),
            'health_worker_id' => fake()->randomElement($health_workers)
        ];
    }
}

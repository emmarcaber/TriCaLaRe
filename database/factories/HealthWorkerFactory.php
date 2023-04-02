<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthWorker>
 */
class HealthWorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date_of_birth = fake()->dateTimeInInterval('-25 years', '-35 years');

        return [
            'name' => fake()->name(),
            'age' => Carbon::parse($date_of_birth)->age,
            'sex' => fake()->randomElement([0, 1, 2]),
            'date_of_birth' => $date_of_birth,
            'contact_number' => '09' . fake()->numerify("#########"),
            'position' => fake()->randomElement(['Nurse', 'Doctor']),
            'work_experience' => fake()->numberBetween(1, Carbon::parse($date_of_birth)->age - 20)
        ];
    }
}

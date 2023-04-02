<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalSupply>
 */
class MedicalSupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Gloves', 'Alcohol', 'Face Masks', 
                'Band-Aids', 'Cotton Balls', 'Gauze Pads',
                'Syringes', 'Needles', 'Antiseptic Solution', 'Betadine'
            ]),
            'description' => fake()->unique()->randomElement([
                '70% Isopropyl Alcohol Solution', 'Surgical masks', 'Nitrile gloves',
                'Adhesive Bandages', 'Sterile cotton balls', 'Sterile gauze pads',
                '25 gauge needles', 'Povidone-Iodine Solution', 'Povidone-Iodine Antiseptic Ointment'
            ]),
            'quantity' => fake()->unique()->randomElement([
                '5 tubes', '10 bottles', '200 pieces', '500 pieces', '1000 pieces', '10 gallons'
            ]),
        ];
    }
}

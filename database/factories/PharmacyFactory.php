<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacy>
 */
class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return
        [
            'name' => 'Pharmacie '.$this->faker->city(),
            'address' => $this->faker->address,
            'operationhours' => $this->faker->randomElement(['9 H - 17 H', '10 H - 18 H', '8 H - 16 H']),
            'garde' => $this->faker->randomElement(['JOUR', 'NUIT', '24H']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

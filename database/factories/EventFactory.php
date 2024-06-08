<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
                'title' => $this->faker->title(),
                'description' => $this->faker->paragraph,
                'type' => $this->faker->randomElement(['Conference', 'donation', 'Workshop', 'Webinar','']),
                'durationhours' => $this->faker->randomElement(['9 H - 17 H', '10 H - 18 H', '8 H - 16 H']),
                'address' => $this->faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equip;
use App\Models\Estadi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partit>
 */
class PartitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'local_id' => Equip::factory(),
            'visitant_id' => Equip::factory(),
            'estadi_id' => Estadi::factory(),
            'data' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'jornada' => $this->faker->numberBetween(1, 38),
            'gols' => $this->faker->numberBetween(0, 5) . '-' . $this->faker->numberBetween(0, 5),
        ];
    }
}

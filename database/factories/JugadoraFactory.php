<?php

namespace Database\Factories;

use App\Models\Equip;
use App\Models\Jugadora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugadora>
 */
class JugadoraFactory extends Factory
{
    protected $model = Jugadora::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name('female'),
            'equip_id' => Equip::factory(),
            'posicio' => $this->faker->randomElement(['Portera', 'Defensa', 'Migcampista', 'Davantera']),
            'dorsal' => $this->faker->numberBetween(1, 99),
            'edat' => $this->faker->numberBetween(16, 40),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cash>
 */
class CashFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'activity_id' => $this->faker->unique()->numberBetween(1, 10),
            'pemasukan' => $this->faker->numberBetween(100000, 10000000),
            'pengeluaran' => $this->faker->numberBetween(100000, 10000000),
            'tanggal' => now(),
        ];
    }
}

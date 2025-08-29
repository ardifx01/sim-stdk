<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventories>
 */
class InventoriesFactory extends Factory
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
            'barang' => $this->faker->sentence(2),
            // 'foto' => $this->faker->imageUrl(300, 300, 'people'),
            'harga' => $this->faker->numberBetween(0, 1000000),
            'jumlah' => $this->faker->numberBetween(1, 100),
            'kondisi' => $this->faker->randomElement(['baik', 'rusak']),
        ];
    }
}

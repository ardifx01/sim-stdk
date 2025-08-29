<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galery>
 */
class GaleryFactory extends Factory
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
            'judul' => $this->faker->sentence(3),
            'keterangan' => $this->faker->sentence(3),
            'foto' => $this->faker->imageUrl(300, 300, 'people'),
            'tanggal' => now(),
            'status' => $this->faker->randomElement(['show', 'hide']),
        ];
    }
}

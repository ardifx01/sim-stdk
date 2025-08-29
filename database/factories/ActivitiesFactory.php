<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activities>
 */
class ActivitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            // 'foto' => $this->faker->imageUrl(300, 300, 'people'),
            'keterangan' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['selesai', 'belum selesai']),
            'tanggal' => now(),
        ];
    }
}

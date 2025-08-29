<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $jabatanOptions = ['ketua', 'wakil ketua', 'sekretaris', 'bendahara', 'anggota', 'tamu'];
        $jabatanOptions = ['anggota', 'tamu'];
        $statusOptions = ['aktif', 'tidak aktif', 'menikah'];
        $jeniskelaminOptions = ['laki laki', 'perempuan'];

        return [
            'nama' => $this->faker->name(),
            'umur' => $this->faker->numberBetween(18, 60),
            'pekerjaan' => $this->faker->jobTitle(),
            // 'foto' => $this->faker->imageUrl(300, 300, 'people'),
            'alamat' => $this->faker->address(),
            'no_telepon' => $this->faker->phoneNumber(),
            'jabatan' => $this->faker->randomElement($jabatanOptions),
            'status' => $this->faker->randomElement($statusOptions),
            'jenis_kelamin' => $this->faker->randomElement($jeniskelaminOptions),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

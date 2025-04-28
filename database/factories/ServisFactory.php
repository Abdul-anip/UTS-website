<?php

namespace Database\Factories;

use App\Models\Servis;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servis>
 */
class ServisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pemilik' => $this->faker->name,
            'no_polisi' => $this->faker->regexify('[A-Z]{1,2}[0-9]{1,4}[A-Z]{1,2}'),
            'jenis_kendaraan' => $this->faker->randomElement(['Mobil', 'Motor']),
            'keluhan' => $this->faker->sentence,
            'jenis_servis' => $this->faker->word,
            'tanggal_servis' => $this->faker->date,
            'biaya' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['menunggu', 'dikerjakan', 'selesai']),
        ];
    }
}

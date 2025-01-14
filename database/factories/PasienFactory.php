<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama'              => $this->faker->name(),
            'tempat_lahir'      => $this->faker->city(),
            'tgl_lahir'         => $this->faker->date(),
            'nik'               => $this->faker->unique()->numerify('################'),
            'nik_ibu'           => $this->faker->numerify('################'),
            'kelamin'           => $this->faker->randomElement(['male', 'female']),
            'lahir_kembar'      => $this->faker->boolean(10), // 10% chance for true
            'no_bpjs'           => $this->faker->numerify('###############'),
            'uuid'              => Str::uuid(),
        ];
    }
}

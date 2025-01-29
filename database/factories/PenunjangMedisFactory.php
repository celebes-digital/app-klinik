<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenunjangMedis>
 */
class PenunjangMedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_penunjang' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{5}'),
            'nama_penunjang' => $this->faker->word(),
        ];
    }

    /**
     * State for LABORATORIUM.
     */
    public function laboratorum(): self
    {
        return $this->state(fn(array $attributes) => [
            'kode_penunjang' => 'LAB00000',
            'nama_penunjang' => 'LABORATORIUM',
        ]);
    }

    /**
     * State for RADIOLOGI.
     */
    public function radiologi(): self
    {
        return $this->state(fn(array $attributes) => [
            'kode_penunjang' => 'RAD00000',
            'nama_penunjang' => 'RADIOLOGI',
        ]);
    }
}

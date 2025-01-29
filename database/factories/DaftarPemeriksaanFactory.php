<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarPemeriksaan>
 */
class DaftarPemeriksaanFactory extends Factory
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
            'nama'           => $this->faker->word(),
            'keterangan'     => $this->faker->sentence(),
        ];
    }

    /**
     * State for RADIOLOGI.
     */
    public function radiologi(): self
    {
        return $this->state(fn(array $attributes) => [
            'kode_penunjang' => 'RAD00000',
            'nama'           => 'Radiologi',
            'keterangan'     => '',
        ]);
    }
    /**
     * State for RADIOLOGI GIGI.
     */
    public function radiologiGigi(): self
    {
        return $this->state(fn(array $attributes) => [
            'kode_penunjang' => 'RAD00000',
            'nama'           => 'Radiologi Gigi',
            'keterangan'     => '',
        ]);
    }
    /**
     * State for Kedokteran Nuklir.
     */
    public function kedokteranNuklir(): self
    {
        return $this->state(fn(array $attributes) => [
            'kode_penunjang' => 'RAD00000',
            'nama'           => 'Kedokteran Nuklir',
            'keterangan'     => '',
        ]);
    }
}

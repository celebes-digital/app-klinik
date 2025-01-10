<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name, // Nama lengkap
            'tgl_lahir' => $this->faker->date('Y-m-d', '2000-01-01'), // Tanggal lahir
            'nik' => $this->faker->numerify('################'), // 16 digit NIK
            'kelamin' => $this->faker->randomElement(['male', 'female']), // Jenis kelamin
            'alamat' => $this->faker->address, // Alamat lengkap
            'no_telp' => $this->faker->numerify('08##########'), // Nomor telepon
            'no_str' => $this->faker->numerify('STR######'), // Nomor STR (opsional)
            'ihs' => $this->faker->numerify('IHS#####'), // Nomor IHS
        ];
    }
}

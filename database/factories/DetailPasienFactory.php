<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPasien>
 */
class DetailPasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pasien'         => $this->faker->numberbetween(1, Pasien::count()),
            'no_telp'           => $this->faker->phoneNumber(),
            'alamat'            => $this->faker->address(),
            'provinsi'          => $this->faker->state(),
            'kabupaten'         => $this->faker->city(),
            'kecamatan'         => $this->faker->city(),
            'kelurahan'         => $this->faker->city(),
            'rt'                => $this->faker->numerify('##'),
            'rw'                => $this->faker->numerify('##'),
            'kode_pos'          => $this->faker->postcode(),
            'email'             => $this->faker->unique()->safeEmail(),
            'pekerjaan'         => $this->faker->jobTitle(),
            'pendidikan'        => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'kewarganegaraan'   => $this->faker->randomElement(['WNI', 'WNA']),
            'status_nikah'      => $this->faker->randomElement(['Married', 'Unmarried', 'Divorced', 'Widowed']),
        ];
    }
}

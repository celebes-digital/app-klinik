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
            'hidup'             => $this->faker->boolean(90), // 90% chance for true
            'alamat'            => $this->faker->address(),
            'no_telp'           => $this->faker->phoneNumber(),
            'no_bpjs'           => $this->faker->numerify('###############'),
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
            'uuid'              => Str::uuid(),
        ];
    }
}

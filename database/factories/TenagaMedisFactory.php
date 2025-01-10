<?php

namespace Database\Factories;

use App\Models\TenagaMedis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TenagaMedis>
 */
class TenagaMedisFactory extends Factory
{
    protected $model = TenagaMedis::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nik' => $this->faker->unique()->numerify('###############'),
            'no_str' => $this->faker->optional()->regexify('STR[0-9]{5}'),
            'alamat' => $this->faker->address,
            'no_telp' => $this->faker->unique()->phoneNumber,
            'ihs' => $this->faker->regexify('IHS[0-9]{5}'),
        ];
    }
}

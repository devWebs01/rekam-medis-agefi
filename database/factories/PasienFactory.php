<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'wa' => '62' . $this->faker->unique()->randomNumber(9, true), // Indonesian phone number format
            'jk' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Layanan;
use App\Models\Tarif; // Import Layanan model
use Illuminate\Database\Eloquent\Factories\Factory;

class TarifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tarif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'layanan_id' => Layanan::factory(), // Create a Layanan if one doesn't exist
            'nominal' => $this->faker->numberBetween(50000, 500000), // Example nominal range
        ];
    }
}

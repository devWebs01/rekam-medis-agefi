<?php

namespace Database\Factories;

use App\Models\Diagnosa;
use App\Models\Jadwal; // Import Jadwal model
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnosa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jadwal_id' => Jadwal::factory(), // Create a Jadwal if one doesn't exist
            'hasil' => $this->faker->paragraph(),
        ];
    }
}

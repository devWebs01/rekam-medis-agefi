<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\Tarif;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // For UUID

class JadwalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jadwal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'pasien_id' => Pasien::factory(),
            'dokter_id' => Dokter::factory(),
            'tarif_id' => Tarif::factory(),
            'tgl' => $this->faker->date(),
            'waktu' => $this->faker->time(),
            'status' => $this->faker->randomElement(['ok', 'belum']),
        ];
    }
}

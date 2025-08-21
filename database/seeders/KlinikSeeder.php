<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Layanan;
use App\Models\Pasien;
use App\Models\Tarif;
use App\Models\User; // Assuming User model is also seeded
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default Dev user
        User::create([
            'name' => 'Dev User',
            'username' => 'dev',
            'email' => 'dev@example.com',
            'password' => Hash::make('password'),
            'role' => 'Dev',
            'dokter_id' => null, // Dev user might not be a doctor
        ]);

        // Create a default Dokter user
        $dokter = Dokter::factory()->create([
            'nama' => 'Dr. John Doe',
            'alamat' => 'Jl. Merdeka No. 10',
            'wa' => '6281234567890',
        ]);

        User::create([
            'name' => $dokter->nama,
            'username' => 'dokter',
            'email' => 'dokter@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'dokter_id' => $dokter->id,
        ]);

        // Seed other data
        Pasien::factory()->count(10)->create();
        Layanan::factory()->count(5)->create();
        Tarif::factory()->count(5)->create(); // This will also create Layanan if not exists
        Jadwal::factory()->count(10)->create(); // This will also create Pasien, Dokter, Tarif if not exists
        Diagnosa::factory()->count(5)->create(); // This will also create Jadwal if not exists
    }
}

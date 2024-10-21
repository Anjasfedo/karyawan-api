<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Karyawan::create([
            'nama_karyawan' => 'John Doe',
            'jabatan' => 'Manager',
            'gaji' => 5000000,
            'tanggal_masuk' => '2023-10-01',
        ]);

        Karyawan::create([
            'nama_karyawan' => 'Jane Smith',
            'jabatan' => 'Developer',
            'gaji' => 4000000,
            'tanggal_masuk' => '2022-09-15',
        ]);
    }
}
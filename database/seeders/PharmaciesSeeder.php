<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmaciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pharmacies')->insert([
            [
                'nom' => 'Pharmacie Touba',
                'adresse' => 'Dakar Plateau',
                'telephone' => '771234567',
                'email' => 'touba@pharma.com',
                'latitude' => 14.6928,
                'longitude' => -17.4467,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pharmacie Médina',
                'adresse' => 'Médina, Dakar',
                'telephone' => '772345678',
                'email' => 'medina@pharma.com',
                'latitude' => 14.7000,
                'longitude' => -17.4500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pharmacie Liberté',
                'adresse' => 'Liberté 6, Dakar',
                'telephone' => '773456789',
                'email' => 'liberte@pharma.com',
                'latitude' => 14.7050,
                'longitude' => -17.4400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

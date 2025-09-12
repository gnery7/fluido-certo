<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manufacturer; // Importante adicionar esta linha

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacturer::create(['name' => 'Montadora Alfa']); // ID será 1
        Manufacturer::create(['name' => 'Montadora Beta']); // ID será 2
        Manufacturer::create(['name' => 'Montadora Gama']); // ID será 3
    }
}
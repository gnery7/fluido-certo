<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModel; // Importante adicionar esta linha

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Modelos da Montadora Alfa (ID 1)
        CarModel::create(['manufacturer_id' => 1, 'name' => 'Superion']);
        CarModel::create(['manufacturer_id' => 1, 'name' => 'Vectron']);

        // Modelos da Montadora Beta (ID 2)
        CarModel::create(['manufacturer_id' => 2, 'name' => 'Galaxar']);

        // Modelos da Montadora Gama (ID 3)
        CarModel::create(['manufacturer_id' => 3, 'name' => 'Pulsar']);
        CarModel::create(['manufacturer_id' => 3, 'name' => 'Quasar']);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OilRecommendation; // Importante adicionar esta linha

class OilRecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recomendações para o Superion (ID do modelo: 1)
        OilRecommendation::create(['car_model_id' => 1, 'year' => 2023, 'recommended_oil' => 'Óleo Tipo A']);
        OilRecommendation::create(['car_model_id' => 1, 'year' => 2024, 'recommended_oil' => 'Óleo Tipo A']);
        OilRecommendation::create(['car_model_id' => 1, 'year' => 2025, 'recommended_oil' => 'Óleo Tipo B']);

        // Recomendações para o Vectron (ID do modelo: 2)
        OilRecommendation::create(['car_model_id' => 2, 'year' => 2022, 'recommended_oil' => 'Óleo Tipo C']);

        // Recomendações para o Galaxar (ID do modelo: 3)
        OilRecommendation::create(['car_model_id' => 3, 'year' => 2024, 'recommended_oil' => 'Óleo Tipo B']);
        OilRecommendation::create(['car_model_id' => 3, 'year' => 2025, 'recommended_oil' => 'Óleo Tipo B']);

        // Recomendações para o Quasar (ID do modelo: 5)
        OilRecommendation::create(['car_model_id' => 5, 'year' => 2021, 'recommended_oil' => 'Óleo Tipo C']);
    }
}
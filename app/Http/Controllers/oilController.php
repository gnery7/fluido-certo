<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\CarModel;
use App\Models\OilRecommendation;

class OilController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function selection()
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
        return view('selection', ['manufacturers' => $manufacturers]);
    }

    public function getModels(Request $request)
    {
        $models = CarModel::where('manufacturer_id', $request->manufacturer_id)
                          ->orderBy('name')
                          ->get();
    
        return response()->json($models);
    }

    public function getYears(Request $request)
    {
        $years = OilRecommendation::where('car_model_id', $request->car_model_id)
                                  ->distinct()
                                  ->orderBy('year', 'desc')
                                  ->pluck('year');
        return response()->json($years);
    }

    public function getRecommendation(Request $request)
    {
        $recommendation = OilRecommendation::where('car_model_id', $request->car_model_id)
                                           ->where('year', $request->year)
                                           ->first();

        if ($recommendation) {
            return response()->json(['oil' => $recommendation->recommended_oil]);
        }

        return response()->json(['error' => 'Recomendação não encontrada.'], 404);
    }
}
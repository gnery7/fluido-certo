<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecommendationController extends Controller
{
    public function query(Request $request)
    {
        // 1. Validar os dados de entrada
        $validator = Validator::make($request->all(), [
            'manufacturer' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Parâmetros inválidos.', 'details' => $validator->errors()], 400);
        }

        // 2. Buscar os dados no banco de dados
        $manufacturer = Manufacturer::where('name', $request->manufacturer)->first();

        if (!$manufacturer) {
            return response()->json(['error' => 'Montadora não encontrada.'], 404);
        }

        // Busca o modelo que pertence a esta montadora
        $carModel = $manufacturer->carModels()->where('name', $request->model)->first();

        if (!$carModel) {
            return response()->json(['error' => 'Modelo não encontrado para esta montadora.'], 404);
        }

        // Busca a recomendação para este modelo e ano
        $recommendation = $carModel->oilRecommendations()->where('year', $request->year)->first();

        if (!$recommendation) {
            return response()->json(['error' => 'Recomendação não encontrada para este modelo e ano.'], 404);
        }

        // 3. Retornar a resposta de sucesso
        return response()->json([
            'data' => [
                'recommended_oil' => $recommendation->recommended_oil
            ]
        ]);
    }
}
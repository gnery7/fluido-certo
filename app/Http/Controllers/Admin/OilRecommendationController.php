<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OilRecommendation;
use Illuminate\Http\Request;
use App\Models\CarModel;

class OilRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recommendations = OilRecommendation::with('carModel.manufacturer')
                                ->latest()
                                ->get();

        return view('admin.recommendations.index', ['recommendations' => $recommendations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carModels = CarModel::orderBy('name')->get();

        return view('admin.recommendations.create', ['carModels' => $carModels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'recommended_oil' => 'required|string|max:255',
        ]);

        OilRecommendation::create($validatedData);

        return redirect()->route('admin.recommendations.index')->with('success', 'Recomendação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OilRecommendation $oilRecommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OilRecommendation $recommendation)
    {
        $carModels = CarModel::orderBy('name')->get();

        return view('admin.recommendations.edit', [
            'recommendation' => $recommendation,
            'carModels' => $carModels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OilRecommendation $recommendation)
    {
        $validatedData = $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'recommended_oil' => 'required|string|max:255',
        ]);

        $recommendation->update($validatedData);

        return redirect()->route('admin.recommendations.index')->with('success', 'Recomendação atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OilRecommendation $recommendation)
    {
        $recommendation->delete();

        return redirect()->route('admin.recommendations.index')->with('success', 'Recomendação excluída com sucesso!');
    }
}

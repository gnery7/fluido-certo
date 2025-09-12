<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Models\Manufacturer;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = CarModel::with('manufacturer')
        ->join('manufacturers', 'car_models.manufacturer_id', '=', 'manufacturers.id')
        ->orderBy('manufacturers.name', 'asc')
        ->orderBy('car_models.name', 'asc')
        ->select('car_models.*') // Importante para evitar conflitos de colunas 'id'
        ->get();

        return view('admin.models.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
    
        return view('admin.models.create', ['manufacturers' => $manufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        CarModel::create($validatedData);

        return redirect()->route('admin.models.index')->with('success', 'Modelo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $model) // Nome da variável alterado aqui
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
  
        return view('admin.models.edit', [
            'model' => $model, // E aqui também, para consistência
            'manufacturers' => $manufacturers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $model)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        $model->update($validatedData);

        return redirect()->route('admin.models.index')->with('success', 'Modelo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $model)
    {
        $model->delete();

        return redirect()->route('admin.models.index')->with('success', 'Modelo excluído com sucesso!');
    }
}

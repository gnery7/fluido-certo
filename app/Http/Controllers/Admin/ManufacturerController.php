<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;


class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:manufacturers|max:255',
        ]);

        Manufacturer::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Montadora criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.edit', ['manufacturer' => $manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:manufacturers,name,' . $manufacturer->id,
        ]);

        $manufacturer->update($validatedData);
        return redirect()->route('dashboard')->with('success', 'Montadora atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    { 
        $manufacturer->delete();
  
        return redirect()->route('dashboard')->with('success', 'Montadora excluída com sucesso!');
    }
}

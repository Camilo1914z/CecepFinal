<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Http\Controllers\Controller;


class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }
    
    public function create()
    {
        return view('carreras.create');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Otros campos que puedas tener...
        ]);

        // Crea una nueva instancia de Carrera con los datos del formulario
        Carrera::create($request->all());

        // Redirige a la vista de index o a donde desees después de crear la carrera
        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente');
    }

    public function destroy(Carrera $carrera)
{
    $carrera->delete();

    return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente');
}

public function edit($id)
{
    $carrera = Carrera::findOrFail($id);

    return view('carreras.edit', compact('carrera'));
}

public function update(Request $request, Carrera $carrera)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        // Otros campos que necesites validar
    ]);

    $carrera->update($request->all());

    return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente');
}



}

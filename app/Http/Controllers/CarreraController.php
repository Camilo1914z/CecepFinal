<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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

        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Carrera::create($request->all());

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

    ]);

    $carrera->update($request->all());

    return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente');
}



}

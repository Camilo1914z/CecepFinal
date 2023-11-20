<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
 
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request)
    {
          $request->validate([
            'nombre' => 'required|string|max:255',
            'carrera_id' => 'required|exists:carreras,id',

        ]);

        Estudiante::create([
            'nombre' => $request->input('nombre'),
            'carrera_id' => $request->input('carrera_id'),
        ]);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente');
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();

        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente');
    }

}

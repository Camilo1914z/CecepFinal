<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarreraApiController extends Controller
{
    public function index()
    {
        // Obtener todas las carreras desde la base de datos
        $carreras = Carrera::all();

        // Devolver las carreras en formato JSON
        return response()->json($carreras);
    }

    public function show($id)
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        return response()->json($carrera);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:carreras,nombre',
        ]);

        $carrera = Carrera::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json($carrera, 201);
    }

    public function update(Request $request, $id)
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|unique:carreras,nombre,' . $id,
        ]);

        $carrera->update([
            'nombre' => $request->nombre,
        ]);

        return response()->json($carrera, 200);
    }

    public function destroy($id)
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        $carrera->delete();

        return response()->json(['message' => 'Carrera eliminada'], 200);
    }
}

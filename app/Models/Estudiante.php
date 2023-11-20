<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'carrera_id', // Asegúrate de agregar todos los campos necesarios
        // Otros campos si los tienes
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Estudiante</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Estudiante</h2>

        <form method="post" action="{{ route('estudiantes.update', $estudiante->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Estudiante</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="carrera_id" class="form-label">Carrera</label>
                <select class="form-select" id="carrera_id" name="carrera_id" required>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ $carrera->id == $estudiante->carrera_id ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

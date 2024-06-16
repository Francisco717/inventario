<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <h1>Editar Producto</h1>

    <div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="col-md-8">
                    <form action="{{url('/productos',[$producto])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" value="{{ $producto->cantidad }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_categoria">Categoría</label>
                            <select name="id_categoria" class="form-control" required>
                                @foreach ($categoria as $row)
                                <option value="{{ $row->id }}" {{ $producto->id_categoria == $row->id ? 'selected' : '' }}>
                                    {{ $row->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
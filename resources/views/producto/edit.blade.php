<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Editar Productos</h1>
         
        @if (session()->has('error'))
          <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
          </div>
        @endif

        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div>
                <label for="codigoProducto">Codigo producto</label>
                <input type="text" class="form-control" name="codigoProducto" id="codigoProducto" 
                    value="{{ $producto->codigoProducto }}">
                @error('codigoProducto')
                    {{ $message }}
                @enderror
            </div>
            <div class="mt-3">
                <label for="descripcionProducto">Descripcion producto</label>
                <input type="text" class="form-control" name="descripcionProducto" id="descripcionProducto" value="{{ $producto->descripcionProducto }}">
                @error('descripcionProducto')
                    {{ $message }}
                @enderror
            </div>
            <div class="mt-3">
                <label for="precioProducto">Precio producto</label>
                <input type="number" step="0.01" class="form-control" name="precioProducto" id="precioProducto" value="{{ $producto->precioProducto }}">
                @error('precioProducto')
                    {{ $message }}
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-sm btn-success">Editar producto</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
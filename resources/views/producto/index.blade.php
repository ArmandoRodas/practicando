<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-sm btn-primary">Crear producto</a>
        <a href="{{ route('productos.inactivo') }}" class="btn btn-sm btn-secondary">Ver productos inactivos</a>

        @if (session()->has('success'))
          <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
          </div>
        @endif
        
        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->codigoProducto }}</td>
                    <td>{{ $producto->descripcionProducto }}</td>
                    <td>Q. {{ $producto->precioProducto }}</td>
                    <td>
                      <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                      <a href="{{ route('productos.view', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                      <form 
                        action="{{ route('productos.toggle', $producto) }}" 
                        method="POST" 
                        style="display:inline-block;"
                      >
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-danger">Desactivar</button>
                      </form>
                    </td>
                </tr>
              @empty
                  <tr>
                    <td colspan="4" class="text-center">No se encontró ningún registro</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

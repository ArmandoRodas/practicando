<!doctype html>
<html lang="es">
  <head>
    {{-- para que reciba caracteres como ñ --}}
    <meta charset="utf-8">
    {{-- hace la pagina responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos Inactivos</title>
    {{-- importarcion de estilos de bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
      <h1 class="text-center mb-4">Productos Inactivos</h1>
      <a href="{{ route('producto.index') }}" class="btn btn-sm btn-primary mb-3">Volver a productos</a>

      @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <table class="table table">
        <thead class="table-dark">
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($productosInactivos as $producto)
            <tr>
              <td>{{ $producto->codigoProducto }}</td>
              <td>{{ $producto->descripcionProducto }}</td>
              <td>Q. {{ $producto->precioProducto }}</td>
              <td>
                <form
                  action="{{ route('productos.toggle', $producto) }}"
                  method="POST"
                  style="display:inline-block;"
                >
                  @csrf
                  @method('PATCH')
                  <button
                    type="submit"
                    class="btn btn-sm btn-success"
                  >
                    Activar
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center">No hay productos inactivos</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

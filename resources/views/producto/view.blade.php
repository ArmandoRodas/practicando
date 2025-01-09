<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <h1>Detalles del Producto</h1>
        <p><strong>Código:</strong> {{ $producto->codigoProducto }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcionProducto }}</p>
        <p><strong>Precio:</strong> Q. {{ $producto->precioProducto }}</p>
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
    </div>
  </body>
</html>

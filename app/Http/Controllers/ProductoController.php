<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index() {

         $productos = Producto::where('estado', 1)->get();
        //$productos = Producto::all();
        //dd($productos);
        return view('producto.index', compact('productos'));
    }

   
    public function toggleEstado(Producto $producto)
    {
        $producto->estado = !$producto->estado; 
        $producto->save();

        session()->flash('success', 'Estado del producto actualizado  correctamente.');
        return redirect()->route('producto.index');
    }   



    public function inactivo()
    {
        $productosInactivos = Producto::where('estado', 0)->get(); 
        return view('producto.inactivos', compact('productosInactivos'));
    }


    public function create() {
        return view('producto.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'codigoProducto' => 'required',
            'descripcionProducto' => 'required|max:100',
            'precioProducto' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();
            
            // Producto::create([
                // 'codigoProducto' => $request->codigoProducto,
                // 'descripcionProducto' => $request->descripcionProducto,
                // 'precioProducto' => $request->precioProducto
            // ]);

            $producto = new Producto();
            $producto->codigoProducto = $request->codigoProducto;
            $producto->descripcionProducto = $request->descripcionProducto;
            $producto->precioProducto = $request->precioProducto;
            $producto->save();

            DB::commit();
            session()->flash('success', 'Producto creado correctamente.');
            return to_route('productos.index');
        } catch (\Throwable $th) {
           DB::rollBack();
           return back()->with('error', 'Error al crear el producto: ' . $th->getMessage());
        }
    }

    public function edit(Producto $producto)
    {
        return view('producto.edit', [
            'producto' => $producto
        ]);
    }

    public function update(Request $request, Producto $producto) {

        $this->validate($request, [
            'codigoProducto' => 'required',
            'descripcionProducto' => 'required|max:100',
            'precioProducto' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();
            
            $producto->update([
                'codigoProducto' => $request->codigoProducto,
                'descripcionProducto' => $request->descripcionProducto,
                'precioProducto' => $request->precioProducto
            ]);

            DB::commit();
            session()->flash('success', 'Producto actualizado correctamente.');
            return to_route('productos.index');
        } catch (\Throwable $th) {
           DB::rollBack();
           return back()->with('error', 'Error al actualizar el producto: ' . $th->getMessage());
        }
    }


    public function view(Producto $producto)
     {
        return view ('producto.view', [
            'producto'=>$producto
        ]);
     }



    /*
        TAREAS:
        1. Poder eliminar registros.
        2. Poder ver regitro.

        Para mañana a mas tardar.
    */
}

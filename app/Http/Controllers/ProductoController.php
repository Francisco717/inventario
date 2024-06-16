<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::with('categoria:id,nombre')->paginate(10);
        $categoria = Categoria::all();
        return view('products.Productos', compact('productos','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = new Producto();
        $producto->nombre = $request->get('nombre');
        $producto->cantidad = $request->get('cantidad');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $producto = Producto::find($id);
        $categoria = Categoria::all();
        return view('products.EditarProducto', compact('producto','categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $producto = Producto::find($id);
        $producto->nombre = $request->get('nombre');
        $producto->cantidad = $request->get('cantidad');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->save();
        session()->flash('success_message', 'El producto fue actualizado exitosamente');
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }
}

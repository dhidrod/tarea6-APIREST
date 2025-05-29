<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Product::all();
        return response()->json($productos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'marca' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'stock' => 'required|integer|min:0'
        ]);

        $producto = Product::create($validated);

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'producto' => $producto
        ], 201);
    }

    public function show(Product $productoLimpieza)
    {
        return response()->json($productoLimpieza);
    }

    public function update(Request $request, Product $productoLimpieza)
    {
        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric|min:0',
            'marca' => 'sometimes|required|string|max:255',
            'categoria' => 'sometimes|required|string|max:255',
            'stock' => 'sometimes|required|integer|min:0'
        ]);

        $productoLimpieza->update($validated);

        return response()->json([
            'message' => 'Producto actualizado exitosamente',
            'producto' => $productoLimpieza
        ]);
    }

    public function destroy(Product $productoLimpieza)
    {
        $productoLimpieza->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente'
        ]);
    }
}

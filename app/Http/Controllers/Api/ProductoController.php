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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
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

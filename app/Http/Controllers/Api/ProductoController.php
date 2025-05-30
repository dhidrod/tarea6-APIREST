<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
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

    public function show($id): JsonResponse
    {
        // DIAGNÓSTICO: Verificar si encuentra el producto
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'debug_info' => [
                    'id_buscado' => $id,
                    'total_productos' => Product::count(),
                    'ids_existentes' => Product::pluck('id')->toArray()
                ]
            ], 404);
        }

        return response()->json($producto);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado para actualizar',
                'id' => $id
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0'
        ]);

        // Actualizar solo los campos enviados
        $producto->update($request->only(['name', 'description', 'price']));

        // Recargar el modelo para obtener los datos actualizados
        $producto->refresh();

        return response()->json([
            'message' => 'Producto actualizado correctamente',
            'producto' => $producto
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado para eliminar',
                'id' => $id
            ], 404);
        }

        $nombreProducto = $producto->name;
        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado correctamente',
            'producto_eliminado' => $nombreProducto
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
        $validatedData = $request->validated();

        $product = Product::create([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'description' => $validatedData['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Producto creado correctamente',
            'product' => $product
        ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'No se pudo crear el producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        // Verificar si el producto existe
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return Product::where("id", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el producto por ID
        $product = Product::find($id);

        // Verificar si el producto existe
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        try {
            $rules = [
                'name' => 'required|string|max:255',
                'quantity' => 'required|numeric|min:0',
                'description' => 'nullable|string|max:500',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                $errors = $validator->errors()->all();
                return response()->json($errors, 400);
            }

            // Continuar con la lógica de actualización si la validación es exitosa
            $validatedData = $validator->validated();

            // Actualizar los campos del producto
            $product->name = $validatedData['name'];
            $product->quantity = $validatedData['quantity'];
            $product->description = $validatedData['description'];

            $product->save();

            // Devolver el producto actualizado como respuesta
            return response()->json([
                'message' => 'Producto actualizado correctamente',
                'product' => $product
            ], 200);

        } catch (\Exception $e) {
            // Manejo de errores con detalles
            return response()->json([
                'message' => 'No se pudo actualizar el producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }
}

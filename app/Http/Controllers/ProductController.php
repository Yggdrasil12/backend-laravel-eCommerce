<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $consult = Product::with('images')->where("id", $id)->first();

        if ($consult && $consult->images->isNotEmpty()) {
            $url = $consult->images[0]->image_url; // Obtén la primera URL
            $consult->setAttribute('image_url', $url); // Agrega un atributo temporal al modelo
            $consult->unsetRelation('images'); // Elimina la relación `images` de la respuesta
        }

        return $consult; // Retorna el producto con la URL como atributo adicional
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
    public function update(Request $request, int $id)
    {
        // return $request;
        $product = Product::find($id);

        // Verificar si el producto existe
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        // Validar los datos de la solicitud (opcional, pero recomendado)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
            // Agrega más reglas según los campos que necesites actualizar
        ]);

         // Actualizar los campos del producto
        $product->update($validatedData);

        // Devolver el producto actualizado como respuesta
        return response()->json(['message' => 'Producto actualizado correctamente', 'product' => $product], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

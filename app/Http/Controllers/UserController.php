<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email): JsonResponse|User
    {
        $user = User::where('email',$email)->first();
        if (!$user){
            return response()->json([
                'message' => 'No se encontro el usuario especificado'
            ],404);
        }
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {

        $user = User::where('email',$email)->first();
        if (!$user){
            return response()->json([
                'message' => 'No se encontro el usuario especificado'
            ],404);
        }

        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $errors = $validator->errors()->all();
            return response()->json($errors, 400);
        }

        // Continuar con la lógica de actualización si la validación es exitosa
        $validatedData = $validator->validated();

        try{

        // Actualizar los datos del usuario con la validación aplicada
            $user->name = $validatedData['name'];
            $user->email = $email;

            // Si se envió una contraseña, hashearla antes de actualizarla
            if (isset($validatedData['password']) && $validatedData['password']) {
                $user->password = bcrypt($validatedData['password']);
            }

            // Actualizar los otros campos si se enviaron
            if (isset($validatedData['phone'])) {
                $user->phone = $validatedData['phone'];
            }

            if (isset($validatedData['address'])) {
                $user->address = $validatedData['address'];
            }

            // Guardar los cambios en la base de datos
            $user->save();

            // Devolver una respuesta exitosa
            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'user' => $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'no se pudo actualizar el usuario: ' . $e->getMessage(),
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

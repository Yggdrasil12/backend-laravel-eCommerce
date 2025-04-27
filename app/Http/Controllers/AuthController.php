<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        try {
            // Validar los datos del formulario
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'phone' => 'required|integer',
                'address' => 'required|string',
            ]);

            // Crear un nuevo usuario y guardarlo en la base de datos
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Hashear la contraseña
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return response()->json([
                'message' => 'Usuario guardado correctamente',
                'user' => $user, // Opcional: devolver el usuario creado
            ], 201); // Código de estado 201 Created

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'No fue posible cargar en la aplicación',
                'error' => $e->getMessage(), // Opcional: devolver el mensaje de error
            ], 500); // Código de estado 500 Internal Server Error
        }
    }
        public function login(Request $request){
        try {
            // Validar los datos del formulario
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Buscar al usuario por su correo electrónico
            $user = User::where('email', $request->email)->first();

            // Verificar si el usuario existe y si la contraseña es correcta
            if ($user && Hash::check($request->password, $user->password)) {
                // La contraseña es correcta, iniciar sesión
                Auth::login($user);

                return response()->json([
                    'message' => 'Inicio de sesión exitoso.',
                    'user' => $user,
                ]);
            }

            // Si las credenciales son incorrectas
            return response()->json([
                'message' => 'Las credenciales proporcionadas son incorrectas.',
            ], 401); // Código de estado 401 Unauthorized

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'No fue posible realizar el logueo',
                'error' => $e->getMessage(),
            ], 500); // Código de estado 500 Internal Server Error
        }
    }
}

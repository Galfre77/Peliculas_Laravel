<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    public function __construct()
    {
        // Solo permite acceso si el usuario está autenticado
        $this->middleware('auth')->only(['alta.pelicula', 'mto.pelicula']);
    }
    public function usuario()
    {
        return view('auth.usuario');
    }
    public function guardarUsuario(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::alta($data);


        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Por favor, inicie sesión.');
    }
    public function altaPelicula()
    {
        return view('alta.pelicula');
    }

    public function mtoPelicula()
    {
        return view('mto.pelicula');
    }
}

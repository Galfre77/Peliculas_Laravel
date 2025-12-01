<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacionSessionController extends Controller
{
    // Mostrar el formulario de login
    public function login()
    {
        return view('auth.login'); // asegúrate de tener resources/views/auth/login.blade.php
    }

    //Validar credenciales y autenticar usuario
    public function validar(Request $request)
    {
        // Validamos que se envíen los datos correctos
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentamos autenticar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // protege contra session fixation
            return redirect()->intended('/')->with('success', 'Sesión iniciada correctamente.'); // redirige a la página que intentaba acceder o al inicio
        }

        // Si falla la autenticación
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ])->onlyInput('email');

    }

     //Cerrar sesión

    public function logout(Request $request)
    {
        Auth::logout(); // destruye la sesión del usuario

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }
}

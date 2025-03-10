<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create(){ return view('auth.register'); }

    // Procesa los datos del formulario de registro
    public function store(Request $request){
        // Validación
        $validatedAttributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'confirmed:password_confirmation'],
        ]);

        // Creación del usuario
        $user = User::create($validatedAttributes); 

        // Inicio de sesión con la instancia del usuario (login)
        Auth::login($user);

        // Redirección a página de inicio
        return redirect('/fotos');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
        // Muestra la vista del formulario de login 
        public function create(){
            return view('auth.login');
        }
    
        // Procesa los datos del formulario de login
        public function store(Request $request){ 
           //Validar los datos email y password
           $request->validate([
                'email' => 'required|email',
                'password' => 'required',
           ]);
    
           $attributes = $request->only(['email', 'password']);
    
           // Intentar iniciar sesión con esos datos (email y password)
           if (!Auth::attempt($attributes)) {
                throw ValidationException::withMessages([
                    'email' => 'Esas credenciales no son correctas.'
                ]);
            }
    
           // Registrar sesión regenerando su id 
           $request->session()->regenerate();
    
           // Redirección a la página de inicio
           return redirect('/fotos');
        }
    
        // Cierra sesión
        public function destroy(Request $request){
            // Cerrar sesión
            Auth::logout();
    
            // Invalidar la sesión
            $request->session()->invalidate();
    
            // Redirección a la página de inicio
            return redirect('/login');
        }
}


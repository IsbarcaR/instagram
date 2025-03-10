<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisterController::class, 'create'])->name('register');  //Formulario de registro
Route::post('/register', [RegisterController::class, 'store']);  //Registrar usuario
Route::get('/login', [SessionController::class, 'create']);  //Formulario de login
Route::post('/login', [SessionController::class, 'store'])->name('login');  //Iniciar sesión
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');  //Cerrar sesión 

Route::get('fotos',[FotoController::class,'index'])->name('fotos.index')->middleware('auth');
Route::get('fotos/crear',[FotoController::class, 'create'])->name('fotos.create')->middleware('auth');
Route::post('fotos',[FotoController::class, 'store'])->name('fotos.store')->middleware('auth');
Route::get('fotos/show/{id}',[FotoController::class, 'show'])->name('fotos.show')->middleware('auth');
Route::get('fotos/{id}',[FotoController::class, 'edit'])->name('fotos.edit')->middleware('auth') ;
Route::post('fotos/{id}',[FotoController::class, 'update'])->name('fotos.update')->middleware('auth');
Route::delete('fotos/{id}',[FotoController::class, 'destroy'])->name('fotos.destroy')->middleware('auth');


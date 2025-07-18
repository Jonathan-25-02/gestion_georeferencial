<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroUsuarioController;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/formLogin', [RegistroUsuarioController::class, 'formLogin']);
Route::get('/formRegistro', [RegistroUsuarioController::class, 'formRegistro']);
Route::get('/formExtras', [RegistroUsuarioController::class, 'formExtras']);

Route::get('/formRecuperar', [RegistroUsuarioController::class, 'formRecuperar']);
Route::get('/formVerificar', [RegistroUsuarioController::class, 'formVerificar']);

Route::post('/guardarUsuario', [RegistroUsuarioController::class, 'store']);
Route::post('/iniciarSesion', [RegistroUsuarioController::class, 'iniciarSesion']);
Route::post('/verificarCodigo', [RegistroUsuarioController::class, 'verificarCodigo']);
Route::post('/recuperarPassword', [RegistroUsuarioController::class, 'recuperarPassword']); 

Route::resource('',RegistroUsuarioController::class);













Route::get('/inicio-all', [InicioController::class, 'swipeperfiles']); 
Route::get('/zona-riesgo', [InicioController::class, 'zonariesgo']); 
Route::get('/zona-segura', [InicioController::class, 'zonasegura']); 
Route::get('/punto-encuentro', [InicioController::class, 'puntoencuentro']); 
Route::get('/perfil', [InicioController::class, 'perfil']);
Route::get('/admin', [InicioController::class, 'admin']);


Route::get('/admin/zonas_seguras', [InicioController::class, 'adminzonasseguras']);

Route::get('/admin/zonas_riesgoz', [InicioController::class, 'adminzonasriesgoz']);

Route::get('/admin/puntos_encuentro', [InicioController::class, 'adminpuntosencuentro']);



Route::get('/perfil/editar', [InicioController::class, 'perfileditar']);
Route::post('/perfil/editar/guardar', [InicioController::class, 'perfileditarguardar']);







Route::get('/admin/zonas_seguras/nuevo', [InicioController::class, 'adminzonassegurasnuevo']);
Route::post('/admin/zonas_seguras/nuevo/guardar', [InicioController::class, 'adminzonassegurasnuevoguardar']);
Route::get('/admin/zonas_seguras/{id}/editar', [InicioController::class, 'adminzonasseguraseditar']);
Route::post('/admin/zonas_seguras/{id}/editar/guardar', [InicioController::class, 'adminzonasseguraseditarguardar']);
Route::delete('/admin/zonas_seguras/{id}/eliminar', [InicioController::class, 'adminzonasseguraseliminar']);


Route::get('/admin/zonas_riesgoz/nuevo', [InicioController::class, 'adminzonasriesgoznuevo']);
Route::post('/admin/zonas_riesgoz/nuevo/guardar', [InicioController::class, 'adminzonasriesgoznuevoguardar']);
Route::get('/admin/zonas_riesgoz/{id}/editar', [InicioController::class, 'adminzonasriesgozeditar']);
Route::post('/admin/zonas_riesgoz/{id}/editar/guardar', [InicioController::class, 'adminzonasriesgozeditarguardar']);
Route::delete('/admin/zonas_riesgoz/{id}/eliminar', [InicioController::class, 'adminzonasriesgozeliminar']);


Route::get('/admin/puntos_encuentro/nuevo', [InicioController::class, 'adminpuntosencuentronuevo']);
Route::post('/admin/puntos_encuentro/nuevo/guardar', [InicioController::class, 'adminpuntosencuentronuevoguardar']);
Route::get('/admin/puntos_encuentro/{id}/editar', [InicioController::class, 'adminpuntosencuentroeditar']);
Route::post('/admin/puntos_encuentro/{id}/editar/guardar', [InicioController::class, 'adminpuntosencuentroeditarguardar']);
Route::delete('/admin/puntos_encuentro/{id}/eliminar', [InicioController::class, 'adminpuntosencuentroeliminar']);







Route::resource('/inicio',InicioController::class);
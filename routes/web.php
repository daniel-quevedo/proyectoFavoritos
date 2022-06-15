<?php

use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $favoritos = DB::table('favoritos as fav')
    ->select('fav.*','cat.nombre as categoria','usu.name as usuario')
    ->where('fav.visibilidad', 'Público')
    ->join('categorias as cat','fav.categoriasAsociadas','cat.id')
    ->join('users as usu','fav.idUser','usu.id')
    ->orderByDesc('fav.id')
    ->paginate(10);

    return view('welcome',compact('favoritos'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('categorias', [CategoriasController::class, 'listarCategorias'])->middleware(['auth'])->name('listarCategorias');
Route::view('vistaCrearCat', 'categorias/crearCat')->middleware(['auth'])->name('vistaCrearCat');
Route::post('categorias/crear', [CategoriasController::class, 'crearCategorias'])->middleware(['auth'])->name('crearCategoria');
Route::post('categorias/vistaEditar', [CategoriasController::class, 'vistaEditarCategorias'])->name('vistaEditarCategoria');
Route::post('categorias/editar', [CategoriasController::class, 'editarCategorias'])->name('editarCategoria');
Route::post('categorias/eliminar', [CategoriasController::class, 'eliminarCategorias'])->name('eliminarCategoria');


Route::get('favoritos', [FavoritosController::class, 'listarFavoritos'])->middleware(['auth'])->name('listarFavoritos');
Route::get('favoritos/vistaCrear', [FavoritosController::class, 'vistaCrearFavoritos'])->middleware(['auth'])->name('vistaCrearFavorito');
Route::post('favoritos/crear', [FavoritosController::class, 'crearFavoritos'])->name('crearFavorito');
Route::post('favoritos/vistaEditar', [FavoritosController::class, 'vistaEditarFavoritos'])->name('vistaEditarFavorito');
Route::post('favoritos/editar', [FavoritosController::class, 'editarFavoritos'])->name('editarFavorito');
Route::post('favoritos/eliminar', [FavoritosController::class, 'eliminarFavoritos'])->name('eliminarFavorito');
Route::post('favoritos/detalles', [FavoritosController::class, 'vistaFavoritos'])->name('vistaFavorito');
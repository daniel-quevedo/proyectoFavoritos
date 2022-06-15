<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function listarCategorias(Request $request)
    {
        $listarCat = DB::table('categorias')
        ->where('idUser', Auth::id())
        ->get();

        if ($request->existe == 1) {
            $eliminar = true;
            return view('categorias.listarCat', compact('listarCat','eliminar'));
        }

        return view('categorias.listarCat', compact('listarCat'));
    }

    public function crearCategorias(Request $request)
    {
        DB::table('categorias')->insert([
            'nombre'=> $request->nombre,
            'idUser' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('listarCategorias')->with('crear','correcto');
    }

    public function vistaEditarCategorias(Request $request)
    {
        $catSeleccionada = DB::table('categorias')
        ->where('id', $request->idCat)
        ->where('idUser', Auth::id())
        ->first();

        return view('categorias.editarCat', compact('catSeleccionada'));
    }

    public function editarCategorias(Request $request)
    {
        DB::table('categorias')
        ->where('id', $request->idCat)
        ->where('idUser', Auth::id())
        ->update([
        'nombre' => $request->nombre,
        'updated_at' => now()
        ]);

        return redirect()->route('listarCategorias')->with('editar','correcto');
    }

    public function eliminarCategorias(Request $request)
    {
        $existeFav = DB::table('favoritos')
        ->where('categoriasAsociadas', $request->idCat)
        ->where('idUser', Auth::id())
        ->first();

        if ($existeFav != '' || $existeFav != null) {
            return redirect()->route('listarCategorias')->with('eliminar','no');
        }else{
            DB::table('categorias')
            ->where('id', $request->idCat)
            ->where('idUser', Auth::id())
            ->delete();

            return redirect()->route('listarCategorias')->with('eliminar','correcto');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritosController extends Controller
{
    public function listarFavoritos()
    {
        $listaFav = DB::table('favoritos as fav')
        ->select('fav.*','cat.nombre as categoria')
        ->where('fav.idUser', Auth::id())
        ->join('categorias as cat', 'fav.categoriasAsociadas','cat.id')
        ->orderByDesc('fav.id')
        ->paginate(10);


        return view('favoritos.listarFav', compact('listaFav'));
    }

    public function vistaCrearFavoritos()
    {
        $listarCat = DB::table('categorias')
        ->where('idUser', Auth::id())
        ->get();

        return view('favoritos.crearFav', compact('listarCat'));
    }

    public function crearFavoritos(Request $request)
    {
        DB::table('favoritos')->insert([
            'titulo' => $request->titulo,
            'URL' => $request->url,
            'descripcion' => $request->descripcion,
            'visibilidad' => $request->visibilidad,
            'categoriasAsociadas' => $request->categoria,
            'idUser' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('listarFavoritos')->with('crear','correcto');
    }

    public function vistaEditarFavoritos(Request $request)
    {
        $favSeleccionado = DB::table('favoritos as fav')
        ->select('fav.*','cat.nombre as categoria')
        ->where('fav.id', $request->idFav)
        ->where('fav.idUser', Auth::id())
        ->join('categorias as cat', 'fav.categoriasAsociadas','cat.id')
        ->first();

        $listarCat = DB::table('categorias')
        ->where('idUser',Auth::id())
        ->get();

        if (isset($request->detalle)) {
            $redireccion = 'no';
            return view('favoritos.detalleFav',compact('favSeleccionado','redireccion'));
        } else {
            return view('favoritos.editarFav',compact('favSeleccionado','listarCat'));
        }

    }

    public function editarFavoritos(Request $request)
    {
        DB::table('favoritos')
        ->where('id',$request->idFav)
        ->where('idUser', Auth::id())
        ->update([
            'titulo' => $request->titulo,
            'URL' => $request->url,
            'descripcion' => $request->descripcion,
            'visibilidad' => $request->visibilidad,
            'categoriasAsociadas' => $request->categoria,
            'updated_at' => now()
        ]);


        return redirect()->route('listarFavoritos')->with('editar','correcto');
    }

    public function eliminarFavoritos(Request $request)
    {
        DB::table('favoritos')
        ->where('id', $request->idFav)
        ->where('idUser', Auth::id())
        ->delete();

        return redirect()->route('listarFavoritos')->with('eliminar','correcto');
    }

    public function vistaFavoritos(Request $request)
    {
        $redireccion = $request->detalle;
        $favSeleccionado = DB::table('favoritos as fav')
        ->select('fav.*','cat.nombre as categoria')
        ->where('fav.id', $request->idFav)
        ->join('categorias as cat', 'fav.categoriasAsociadas','cat.id')
        ->first();

        return view('favoritos.detalleFav', compact('favSeleccionado','redireccion'));
    }
}

@extends('layouts.layout')


@section('content')
<div class="text-center">
    @if (Route::has('login'))
        <h1 class="mb-5">Bienvenidos</h1>
        <p class="lead mb-5">Proyecto de Desarrollo Laravel </p>
        <p class="lead ">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light me-4">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-info">Registrarse</a>
                @endif
            @endauth
        </p>
    @endif
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
            <p class="lead text-black">Favoritos</p>
            <div class="mt-5">
                <table class="table table-responsive table-light table-hover table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>URL</th>
                            <th>Título</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($favoritos as $fav)
                            <tr>
                                <td scope="row">{{ $fav->URL }}</td>
                                <td>{{ $fav->titulo }}</td>
                                <td class="text-center">
                                    <form action="{{ route('vistaFavorito') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="idFav" value="{{ $fav->id }}" readonly>
                                        <input type="hidden" name="detalle" value="si" readonly>
                                        <button type="submit" class="btn btn-secondary">Detalles</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $favoritos->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


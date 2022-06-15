@extends('layouts.layout')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
            <h4 class="mb-5 text-black">Detalles Favoritos</h4>
            <div class="mb-3">
                <label for="" class="form-label">URL</label>
                <input type="text" name="url" class="form-control" value="{{ $favSeleccionado->URL }}" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ $favSeleccionado->titulo }}" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" disabled>{{ $favSeleccionado->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoría</label>
                <input type="text" name="categoria" class="form-control" value="{{ $favSeleccionado->categoria }}" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Visibilidad</label>
                <input type="text" name="visibilidad" class="form-control" value="{{ $favSeleccionado->visibilidad }}" disabled>
            </div>
            @if ($redireccion === 'si')
                <a href="{{ route('welcome') }}" class="btn btn-outline-danger">volver</a>
            @else
                <a href="{{ route('listarFavoritos') }}" class="btn btn-outline-danger">volver</a>
            @endif
        </div>
    </div>
</div>
@endsection
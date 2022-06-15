@extends('layouts.app')

@section('content')
<h4 class="mb-5">Editar Favoritos</h4>
<form action="{{ route('editarFavorito') }}" method="post">
    @csrf
    <input type="hidden" name="idFav" value="{{ $favSeleccionado->id }}" readonly>
    <div class="mb-3">
        <label for="" class="form-label">URL</label>
        <input type="text" name="url" class="form-control" value="{{ $favSeleccionado->URL }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $favSeleccionado->titulo }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ $favSeleccionado->descripcion }}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Categoría</label>
        <select class="form-control" name="categoria" required>
            <option value="" disabled >Seleccione...</option>
            <option value="{{ $favSeleccionado->categoriasAsociadas }}" selected>{{ $favSeleccionado->categoria }}</option>
            @foreach ($listarCat as $cat)
                @if ($favSeleccionado->categoriasAsociadas != $cat->id)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Visibilidad</label>
        <select name="visibilidad" class="form-control">
            <option value="Público" {{ $favSeleccionado->visibilidad == 'Público' ? 'selected' : '' }}>Público</option>
            <option value="Privado" {{ $favSeleccionado->visibilidad == 'Privado' ? 'selected' : '' }}>Privado</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{ route('listarFavoritos') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection
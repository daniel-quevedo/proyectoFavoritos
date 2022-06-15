@extends('layouts.app')


@section('content')
<form action="{{ route('crearFavorito') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" autofocus required>
    </div>
    <div class="mb-3">
        <label for="" >URL</label>
        <input type="text" id="url" name="url" class="form-control" required />
    </div>
    <div class="mb-3">
        <label for="" >Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="" >Categoría</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <option value="" selected disabled>Seleccione...</option>
            @foreach ($listarCat as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" >Visibilidad</label>
        <select class="form-select" id="visibilidad" name="visibilidad" required>
            <option value="" selected disabled>Seleccione...</option>
            <option value="Público">Público</option>
            <option value="Privado">Privado</option>
        </select>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-success">Agregar</button>
        <a href="{{ route('listarFavoritos') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection

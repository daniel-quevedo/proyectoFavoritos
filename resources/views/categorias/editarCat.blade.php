@extends('layouts.app')

@section('content')
<h4 class="mb-5">Editar Categoría</h4>
<form action="{{ route('editarCategoria') }}" method="post">
    <input type="hidden" name="idCat" value="{{ $catSeleccionada->id }}" readonly>
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $catSeleccionada->nombre }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{ route('listarCategorias') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection
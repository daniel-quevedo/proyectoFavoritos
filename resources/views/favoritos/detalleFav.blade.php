@extends('layouts.app')

@section('content')
<h4 class="mb-5">Detalles Favoritos</h4>
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
@endsection
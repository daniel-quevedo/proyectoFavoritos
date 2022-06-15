@extends('layouts.app')

@section('content')
<form action="{{ route('crearCategoria') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" autofocus required>
    </div>
    <div>
        <button type="submit" class="btn btn-success">Agregar</button>
        <a href="{{ route('listarCategorias') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection
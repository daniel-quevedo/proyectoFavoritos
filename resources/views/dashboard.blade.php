@extends('layouts.app')

@section('content')
<h5>Bienvenido {{ Auth::user()->name }}</h5>

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
@endsection



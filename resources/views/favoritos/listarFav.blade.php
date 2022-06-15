@extends('layouts.app')

@section('content')
<a href="{{ route('vistaCrearFavorito') }}" class="btn btn-success my-3">Añadir favorito</a>
<table class="table table-responsive table-light table-hover table-bordered">
    <thead class="text-center">
        <tr>
            <th>URL</th>
            <th>Título</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listaFav as $fav)
            <tr>
                <td scope="row">{{ $fav->URL }}</td>
                <td>{{ $fav->titulo }}</td>
                <td class="text-center">
                    <form action="{{ route('vistaEditarFavorito') }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="idFav" value="{{ $fav->id }}" readonly>
                        <input type="hidden" name="detalle" value="si" readonly>
                        <button type="submit" class="btn btn-secondary">Detalles</button>
                    </form>
                    <form action="{{ route('vistaEditarFavorito') }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="idFav" value="{{ $fav->id }}" readonly>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                    <form action="{{ route('eliminarFavorito') }}" method="post" class="d-inline eliminarFav">
                        @csrf
                        <input type="hidden" name="idFav" value="{{ $fav->id }}" readonly>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $listaFav->links() !!}
</div>
@endsection
@section('scripts')

    @if (session('eliminar') == 'correcto')
    <script>
        Swal.fire(
            'Eliminado!',
            'El favorito ha sido eliminado correctamente.',
            'success'
            )
    </script>
    @endif

    @if (session('crear') == 'correcto')
    <script>
        Swal.fire(
        'Creado!',
        'El favorito se ha creado correctamente.',
        'success'
        )
    </script>
    @endif

    @if (session('editar') == 'correcto')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'El favorito ha sido actualizado',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif

    <script>
        $('.eliminarFav').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: 'Estas Seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection

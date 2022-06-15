@extends('layouts.app')

@section('content')
<a href="{{ route('vistaCrearCat') }}" class="btn btn-success my-3">Añadir categoría</a>
<table class="table table-responsive table-light table-hover table-bordered">
    <thead class=" text-center">
        <tr>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($listarCat as $cat)
        <tr>
            <td>{{ $cat->nombre }}</td>
            <td class="text-center">
                <form action="{{ route('vistaEditarCategoria') }}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="idCat" value="{{ $cat->id }}" readonly>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                <form action="{{ route('eliminarCategoria') }}" method="post" class="d-inline eliminarCat">
                    @csrf
                    <input type="hidden" name="idCat" value="{{ $cat->id }}" readonly>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('scripts')

    @if (session('eliminar') == 'correcto')
    <script>
        Swal.fire(
            'Eliminado!',
            'La categoría ha sido eliminado correctamente.',
            'success'
            )
    </script>
    @elseif (session('eliminar') == 'no')
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se puede eliminar esta categoría porque está siendo usada en favoritos!',
        })
    </script>
    @endif

    @if (session('crear') == 'correcto')
    <script>
        Swal.fire(
        'Creado!',
        'La categoría se ha creado correctamente.',
        'success'
        )
    </script>
    @endif

    @if (session('editar') == 'correcto')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'La categoría ha sido actualizada',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif

    <script>
        $('.eliminarCat').submit(function(e){
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


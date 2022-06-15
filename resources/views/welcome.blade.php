@extends('layouts.layout')


@section('content')
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
@endsection


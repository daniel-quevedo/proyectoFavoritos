@extends('layouts.app')

@section('content')
<h5>Bienvenido {{ Auth::user()->name }}</h5>

@endsection



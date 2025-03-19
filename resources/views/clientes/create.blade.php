@extends('layouts.layout')

@section('title', 'Crear Cliente')

@section('content')
    <h1>Nuevo Cliente</h1>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="nombres">Nombres:</label>
            <input type="text" name="nombres" id="nombres" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control"><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control"><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="fecha_registro">Fecha de Registro:</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="tipo_documento">Tipo de Documento:</label>
            <input type="text" name="tipo_documento" id="tipo_documento" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="numero_documento">Número de Documento:</label>
            <input type="text" name="numero_documento" id="numero_documento" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection

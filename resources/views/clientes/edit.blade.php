@extends('layouts.layout')

@section('title', 'Editar Cliente')

@section('content')
    <h1>Editar Cliente</h1>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="nombres">Nombres:</label>
            <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres', $cliente->nombres) }}" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $cliente->apellidos) }}" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email) }}" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}"><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}"><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="fecha_registro">Fecha de Registro:</label>
            <input type="date" name="fecha_registro" class="form-control" value="{{$cliente->fecha_registro }}" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="tipo_documento">Tipo de Documento:</label>
            <input type="text" name="tipo_documento" id="tipo_documento" class="form-control" value="{{ old('tipo_documento', $cliente->tipo_documento) }}" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label" for="numero_documento">Número de Documento:</label>
            <input type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{ old('numero_documento', $cliente->numero_documento) }}" required><br>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>
    </form>
@endsection

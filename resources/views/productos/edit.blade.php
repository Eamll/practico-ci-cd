@extends('layouts.layout')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="form-control" required><br>
        </div>

        <div class="mb-3">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea><br>
        </div>

        <div class="mb-3">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" class="form-control" required><br>
        </div>

        <div class="mb-3">
        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" value="{{ $producto->categoria }}" class="form-control"><br>
        </div>

        <div class="mb-3">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" class="form-control"><br>
        </div>

        <div class="mb-3">
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control">
            <option value="1" {{ $producto->estado ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ !$producto->estado ? 'selected' : '' }}>Inactivo</option>
        </select><br>
        </div>

        <div class="mb-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
    </form>
    @endsection
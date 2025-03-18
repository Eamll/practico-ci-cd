@extends('layouts.layout')

@section('title', 'Crear Producto')

@section('content')
    <h1>Nuevo  Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
        <label class="form-label" for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required><br>
        </div>
        
        <div class="mb-3">
        <label class="form-label" for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control"></textarea><br>
        </div>

        <div class="mb-3">
        <label class="form-label" for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" class="form-control" required><br>
        </div>

        <div class="mb-3">
        <label class="form-label" for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" class="form-control"><br>
        </div>

        <div class="mb-3">
        <label class="form-label" for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="0" class="form-control"><br>
        </div>

        <div class="mb-3">
        <label class="form-label" for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select><br>
        </div>

        <div class="mb-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
    @endsection
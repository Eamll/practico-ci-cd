<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        // Obtener todos los empleados de la base de datos
        $empleados = Empleado::all();

        // Retornar la vista 'empleados.index' con los empleados
        return view('empleados.index', compact('empleados'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required|string|max:15',
            'departamento' => 'required|string|max:255',
        ]);

        // Crear un nuevo empleado con los datos validados
        Empleado::create($request->all());

        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect('/empleados')->with('success', 'Empleado creado correctamente.');
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id_empleado,
            'telefono' => 'required|string|max:15',
            'departamento' => 'required|string|max:255',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}

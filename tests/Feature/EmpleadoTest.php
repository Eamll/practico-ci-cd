<?php

namespace Tests\Feature;

use App\Models\Empleado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_empleados()
    {
        Empleado::factory()->count(5)->create();

        $response = $this->get('/empleados');
        $response->assertStatus(200);
        $response->assertSeeText('Lista de Empleados');
    }

        /** @test */
        public function puede_crear_un_empleado()
        {
            $data = [
                'nombres' => 'Juan',
                'apellidos' => 'Perez',
                'puesto' => 'Gerente',
                'fecha_contratacion' => '2023-01-15',
                'salario' => 3000.50,
                'email' => 'juanperez@example.com',
                'telefono' => '123456789',
                'departamento' => 'Administración',
            ];
    
            $response = $this->post('/empleados', $data);
    
            $response->assertRedirect('/empleados');
            $this->assertDatabaseHas('empleados', $data);
        }

}

<?php

namespace Tests\Unit;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_cliente_tiene_nombres()
    {
        $cliente = Cliente::factory()->create(['nombres' => 'Juan']);

        $this->assertEquals('Juan', $cliente->nombres);
    }

    public function test_cliente_tiene_apellidos()
    {
        $cliente = Cliente::factory()->create(['apellidos' => 'Pérez']);

        $this->assertEquals('Pérez', $cliente->apellidos);
    }

    public function test_cliente_tiene_email()
    {
        $cliente = Cliente::factory()->create(['email' => 'juan@correo.com']);

        $this->assertEquals('juan@correo.com', $cliente->email);
    }

    public function test_cliente_tiene_telefono()
    {
        $cliente = Cliente::factory()->create(['telefono' => '123456789']);

        $this->assertEquals('123456789', $cliente->telefono);
    }

    public function test_cliente_tiene_direccion()
    {
        $cliente = Cliente::factory()->create(['direccion' => 'Calle Falsa 123']);

        $this->assertEquals('Calle Falsa 123', $cliente->direccion);
    }

    public function test_cliente_tiene_fecha_registro()
    {
        $cliente = Cliente::factory()->create(['fecha_registro' => '2025-03-18']);

        $this->assertEquals('2025-03-18', $cliente->fecha_registro);
    }

    public function test_cliente_tiene_tipo_documento()
    {
        $cliente = Cliente::factory()->create(['tipo_documento' => 'DNI']);

        $this->assertEquals('DNI', $cliente->tipo_documento);
    }

    public function test_cliente_tiene_numero_documento()
    {
        $cliente = Cliente::factory()->create(['numero_documento' => '12345678']);

        $this->assertEquals('12345678', $cliente->numero_documento);
    }

    public function test_cliente_se_crea_correctamente()
    {
        $data = [
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'email' => 'juan@correo.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Falsa 123',
            'fecha_registro' => '2025-03-18',
            'tipo_documento' => 'DNI',
            'numero_documento' => '12345678',
        ];

        $cliente = Cliente::factory()->create($data);

        $this->assertDatabaseHas('clientes', [
            'nombres' => $cliente->nombres,
            'apellidos' => $cliente->apellidos,
            'email' => $cliente->email,
            'telefono' => $cliente->telefono,
            'direccion' => $cliente->direccion,
            'fecha_registro' => $cliente->fecha_registro,
            'tipo_documento' => $cliente->tipo_documento,
            'numero_documento' => $cliente->numero_documento,
        ]);
    }

    public function test_cliente_se_actualiza_correctamente()
    {
        $cliente = Cliente::factory()->create();

        $cliente->update([
            'nombres' => 'Carlos',
            'apellidos' => 'Lopez',
            'email' => 'carlos@correo.com',
            'telefono' => '987654321',
            'direccion' => 'Calle Verdadera 456',
            'fecha_registro' => '2025-03-19',
            'tipo_documento' => 'DNI',
            'numero_documento' => '87654321',
        ]);

        $this->assertDatabaseHas('clientes', [
            'nombres' => 'Carlos',
            'apellidos' => 'Lopez',
            'email' => 'carlos@correo.com',
            'telefono' => '987654321',
            'direccion' => 'Calle Verdadera 456',
            'fecha_registro' => '2025-03-19',
            'tipo_documento' => 'DNI',
            'numero_documento' => '87654321',
        ]);
    }

    public function test_cliente_se_elimina_correctamente()
    {
        $cliente = Cliente::factory()->create();

        $cliente->delete();

        $this->assertDatabaseMissing('clientes', [
            'id' => $cliente->id,
        ]);
    }
}

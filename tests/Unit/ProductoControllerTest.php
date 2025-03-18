<?php

namespace Tests\Unit;

use Tests\TestCase;
use app\database\factories\ProductoFactory;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class ProductoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_producto_tiene_nombre()
    {
        $producto = Producto::factory()->create(['nombre' => 'Producto de prueba']);

        $this->assertEquals('Producto de prueba', $producto->nombre);
    }

    public function test_producto_tiene_descripcion()
    {
        $producto = Producto::factory()->create(['descripcion' => 'Descripción de prueba']);

        $this->assertEquals('Descripción de prueba', $producto->descripcion);
    }

    public function test_producto_tiene_precio()
    {
        $producto = Producto::factory()->create(['precio' => 100.00]);

        $this->assertEquals(100.00, $producto->precio);
    }

    public function test_producto_tiene_categoria()
    {
        $producto = Producto::factory()->create(['categoria' => 'Categoría de prueba']);

        $this->assertEquals('Categoría de prueba', $producto->categoria);
    }

    public function test_producto_tiene_stock()
    {
        $producto = Producto::factory()->create(['stock' => 10]);

        $this->assertEquals(10, $producto->stock);
    }

    public function test_producto_tiene_estado()
    {
        $producto = Producto::factory()->create(['estado' => true]);

        $this->assertTrue($producto->estado);
    }

    public function test_producto_se_crea_correctamente()
    {
        $producto = Producto::factory()->create();

        $this->assertDatabaseHas('productos', [
            'id_producto' => $producto->id_producto,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'categoria' => $producto->categoria,
            'stock' => $producto->stock,
            'estado' => $producto->estado,
        ]);
    }

    public function test_producto_se_actualiza_correctamente()
    {
        $producto = Producto::factory()->create();

        $producto->update([
            'nombre' => 'Producto actualizado',
            'descripcion' => 'Descripción actualizada',
            'precio' => 200.00,
            'categoria' => 'Categoría actualizada',
            'stock' => 20,
            'estado' => false,
        ]);

        $this->assertDatabaseHas('productos', [
            'id_producto' => $producto->id_producto,
            'nombre' => 'Producto actualizado',
            'descripcion' => 'Descripción actualizada',
            'precio' => 200.00,
            'categoria' => 'Categoría actualizada',
            'stock' => 20,
            'estado' => false,
        ]);
    }

    public function test_producto_se_elimina_correctamente()
    {
        $producto = Producto::factory()->create();

        $producto->delete();

        $this->assertDatabaseMissing('productos', [
            'id_producto' => $producto->id_producto,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Laptop Dell XPS 13',
            'descripcion' => 'Una laptop ultradelgada y potente.',
            'precio' => 1200.00,
            'categoria' => 'Electrónicos',
            'stock' => 10,
            'estado' => true,
        ]);

        Producto::create([
            'nombre' => 'Monitor LG 27"',
            'descripcion' => 'Un monitor de alta resolución para juegos y trabajo.',
            'precio' => 350.00,
            'categoria' => 'Electrónicos',
            'stock' => 5,
            'estado' => true,
        ]);

        Producto::create([
            'nombre' => 'Teclado Mecánico HyperX Alloy FPS Pro',
            'descripcion' => 'Teclado mecánico compacto con interruptores Cherry MX.',
            'precio' => 99.99,
            'categoria' => 'Periféricos',
            'stock' => 20,
            'estado' => true,
        ]);

        Producto::create([
            'nombre' => 'Mouse Logitech G Pro Wireless',
            'descripcion' => 'Mouse inalámbrico de alto rendimiento para juegos.',
            'precio' => 129.99,
            'categoria' => 'Periféricos',
            'stock' => 15,
            'estado' => true,
        ]);

        Producto::create([
            'nombre' => 'Auriculares Sony WH-1000XM4',
            'descripcion' => 'Auriculares inalámbricos con cancelación de ruido.',
            'precio' => 349.00,
            'categoria' => 'Audio',
            'stock' => 8,
            'estado' => true,
        ]);

        Producto::create([
            'nombre' => 'Impresora Multifunción HP Envy Pro 6455',
            'descripcion' => 'Impresora inalámbrica con escáner y copiadora.',
            'precio' => 149.99,
            'categoria' => 'Oficina',
            'stock' => 12,
            'estado' => true,
        ]);
    
    }
}

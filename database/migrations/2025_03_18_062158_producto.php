<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto'); // Clave primaria autoincremental
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable(); // Permite valores nulos
            $table->decimal('precio', 10, 2);
            $table->string('categoria', 50)->nullable();
            $table->integer('stock')->default(0); // Valor predeterminado 0
            $table->dateTime('fecha_creacion')->useCurrent(); // Fecha de creación automática
            $table->boolean('estado')->default(true); // Valor predeterminado activo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

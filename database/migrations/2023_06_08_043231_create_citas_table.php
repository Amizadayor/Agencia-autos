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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->enum('tipo_cita', ['prueba_manejo', 'mantenimiento', 'entrega']);
            $table->string('descripcion', 200);
            $table->enum('estado_cita', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};

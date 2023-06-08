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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_auto');
            $table->date('fecha_cotizacion');
            $table->string('descripcion', 200);
            $table->decimal('precio', 10, 2);
            $table->enum('estado_cotizacion', ['pendiente', 'enviada', 'aceptada', 'rechazada'])->default('pendiente');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('id_auto')->references('id')->on('autos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};

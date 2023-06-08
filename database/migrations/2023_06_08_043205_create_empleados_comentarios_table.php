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
        Schema::create('empleados_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_comentario');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('id_comentario')->references('id')->on('comentarios')->onDelete('cascade');
            $table->unique(['id_empleado', 'id_comentario']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados_comentarios');
    }
};

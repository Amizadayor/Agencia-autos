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
        Schema::create('autos_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_auto');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_auto')->references('id')->on('autos')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias_autos')->onDelete('cascade');
            $table->unique(['id_auto', 'id_categoria']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos_categorias');
    }
};

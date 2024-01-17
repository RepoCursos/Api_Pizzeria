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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',7,2)->nullable();
            $table->integer('catnidad')->nullable();
            $table->decimal('importe',7,2)->nullable();
            $table->string('medida')->nullable();
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->foreignId('pedido_id')->references('id')->on('pedidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};

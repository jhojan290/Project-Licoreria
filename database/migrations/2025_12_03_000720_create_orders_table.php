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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 12, 2);
            $table->string('status')->default('completed'); // Simulamos que siempre pasa
            $table->string('payment_method'); // Nequi, Bancolombia...
            
            // Datos de Envío
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('identification'); // Cédula
            
            $table->timestamps();
        });

    // Tabla pivote para los productos de la orden
    Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->decimal('price', 12, 2); // Precio al momento de la compra
            $table->string('product_name'); // Guardamos el nombre por si cambia después
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

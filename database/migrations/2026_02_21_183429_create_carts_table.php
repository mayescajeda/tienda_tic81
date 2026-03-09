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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // CORRECCIÓN: foreignId en lugar de string para que funcione la relación Eloquent
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');

            // OBJETIVO: SoftDelete
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            // CORRECCIÓN: foreignId para enlazar con las tablas padres
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1); // Ajustado a 1 por lógica de negocio
            $table->decimal('price', 10, 2); // OBJETIVO: Casts (Aumentado a 10 para evitar errores de cifra)

            // Normalmente los items no llevan softdelete (se borran con el carrito), 
            // pero si tu rúbrica dice TODOS, añádelo:
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');
    }
};

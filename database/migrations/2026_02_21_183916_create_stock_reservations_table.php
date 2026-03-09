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
        Schema::create('stock_reservations', function (Blueprint $table) {
            $table->id();
            // CORRECCIÓN: Relaciones con foreignId
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1); // Ajustado a 1 por lógica
            $table->enum('status', ['active', 'cancelled', 'expired', 'confirmed'])->default('active');
            $table->timestamp('expires_at')->nullable();

            $table->softDeletes(); // OBJETIVO: SoftDelete
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // CORRECCIÓN: Relaciones con foreignId
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2); // OBJETIVO: Casts (Decimal)
            $table->decimal('total', 10, 2);

            $table->softDeletes(); // OBJETIVO: SoftDelete
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // CORRECCIÓN: Relación Uno a Uno con Order
            $table->foreignId('order_id')->unique()->constrained()->onDelete('cascade');

            $table->string('provider', 255);
            $table->string('reference', 255);
            $table->string('status', 255);
            $table->decimal('amount', 10, 2);
            $table->text('payload')->nullable(); // Cambiado a text porque los payloads suelen ser largos

            $table->softDeletes(); // OBJETIVO: SoftDelete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('stock_reservations');
    }
};
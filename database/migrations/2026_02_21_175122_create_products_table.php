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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 255);
            $table->softDeletes(); // OBJETIVO: SoftDelete
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0); // OBJETIVO: Casts (Decimal)
            $table->string('slug', 255);
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes(); // OBJETIVO: SoftDelete
            $table->timestamps();
        });

        // TABLA PIVOTE: Relación Muchos a Muchos
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            // Relación Uno a Muchos
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path', 255);
            $table->integer('order')->default(0); // Cambiado a integer para lógica de negocio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
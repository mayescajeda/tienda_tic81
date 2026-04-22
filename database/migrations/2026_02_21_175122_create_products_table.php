<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration 
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 255);
            $table->softDeletes();
            $table->timestamps();
        });

=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0);
            $table->string('slug', 255);
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);
<<<<<<< HEAD
            $table->softDeletes(); 
=======
            $table->timestamps();
        });       
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 255);
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
=======
            $table->string('product_id');
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path', 255);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
=======
            $table->string('product_id');
            $table->string('image_path',255);
            $table->string('order')->default(0);
            $table->timestamps();
        });
    }                       
};
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf

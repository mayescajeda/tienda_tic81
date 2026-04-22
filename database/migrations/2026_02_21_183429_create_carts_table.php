<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration 
=======
return new class extends Migration
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);

            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');
    }
=======
            $table->string('user_id');
            $table->enum('status', ['active', 'completed','cancelled'])->default('active');
            $table->timestamps();
        });
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('cart_id');
            $table->string('product_id');
            $table->integer('quantity')->default(10);
            $table->decimal('price', 8,2);
            $table->timestamps();
        });
    }
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf
};

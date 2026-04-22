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
        Schema::create('stock_reservations', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1);
            $table->enum('status', ['active', 'cancelled', 'expired', 'confirmed'])->default('active');
            $table->timestamp('expires_at')->nullable();

            $table->softDeletes(); 
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->unique()->constrained()->onDelete('cascade');

            $table->string('provider', 255);
            $table->string('reference', 255);
            $table->string('status', 255);
            $table->decimal('amount', 10, 2);
            $table->text('payload')->nullable(); 

            $table->softDeletes();
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
=======
            $table->string('product_id');
            $table->string('cart_id');
            $table->integer('quantity')->default(10);
            $table->enum('status', ['active', 'cancelled', 'expired', 'confirmed'])->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('product_id');
            $table->integer('quantity')->default(10);
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('provider',255);
            $table->string('reference',255);
            $table->string('status',255);
            $table->decimal('amount', 8, 2);
            $table->string('payload',255);
            $table->timestamps();
        });
    }
};
>>>>>>> 285d8eb9d05da32abdd9e228c75efa2d183571cf

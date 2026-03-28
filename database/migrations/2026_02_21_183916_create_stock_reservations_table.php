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

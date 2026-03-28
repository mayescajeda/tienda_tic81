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
};

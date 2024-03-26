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
        Schema::create('product_sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_sku');
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('subTotal', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sells');
    }
};

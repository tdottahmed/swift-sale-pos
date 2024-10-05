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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->boolean('is_walking_customer')->default(true);
            $table->boolean('is_return')->default(false);
            $table->boolean('is_suspended')->default(false);
            $table->string('payment_type')->nullable();
            $table->double('total_price');
            $table->double('total_quantity');
            $table->float('discountedAmount')->nullable();
            $table->float('paid_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('subtotal', 10,2)->nullable();
            $table->double('shipping', 10,2)->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('coupon_code_id')->nullable()->change();
            // $table->foreignId('coupon_code_id')->constrained()->onDelete('cascade');
            $table->double('discount', 10,2)->nullable();
            $table->double('grand_total', 10,2)->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

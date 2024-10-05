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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->date('delivery_date')->nullable();
            $table->date('repair_completed_on')->nullable();
            $table->integer('status')->default('1');
            $table->foreignId('brand_id')->nullable();
            $table->string('device')->nullable();
            $table->string('device_model')->nullable();
            $table->string('serial_number')->nullable();
            $table->longText('prb_reported_by_customer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};

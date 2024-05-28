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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('payment_method_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->float('amount')->nullable();
            $table->string('reference')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};

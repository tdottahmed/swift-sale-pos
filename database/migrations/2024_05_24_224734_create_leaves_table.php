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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->foreignId('department_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('leave_type_id')->constrained('leave_types')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('total_days')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('attachment')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};

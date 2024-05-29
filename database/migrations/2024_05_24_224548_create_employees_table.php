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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            // $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('department_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('role_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->integer('nid',20)->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('employees');
    }
};

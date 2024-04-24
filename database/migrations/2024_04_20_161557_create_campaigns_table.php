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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('body')->nullable();
            $table->string('attachment')->nullable();
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('campaign_type')->nullable();
            $table->unsignedBigInteger('contact_type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};

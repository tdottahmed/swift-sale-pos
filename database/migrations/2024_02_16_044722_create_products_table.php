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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            // $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('sub_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('barcode_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('unit_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('size_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('color_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('brand');
            $table->string('unit');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode_type')->nullable();
            $table->boolean('manage_stock')->default(true);
            $table->integer('alert_quantity')->nullable();
            $table->integer('expires_in')->nullable();
            $table->string('expiry_period_unit')->nullable();
            $table->string('applicable_tax')->nullable();
            $table->string('selling_price_tax_type')->nullable();
            $table->string('product_type')->nullable();
            $table->string('variation_name')->nullable();
            $table->string('variation_values')->nullable();
            $table->string('variation_skus')->nullable();
            $table->longText('purchase_price_including_tax')->nullable();
            $table->longText('purchase_price_excluding_tax')->nullable();
            $table->string('profit_margin')->nullable();
            $table->string('selling_price')->nullable();
            $table->integer('opening_stock')->nullable();
            $table->string('location')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('enable_imei_or_serial')->default(false);
            $table->string('weight')->nullable();
            $table->string('rack')->nullable();
            $table->string('row')->nullable();
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('custom_field_1')->nullable();
            $table->string('custom_field_2')->nullable();
            $table->string('custom_field_3')->nullable();
            $table->string('custom_field_4')->nullable();
            $table->boolean('not_for_selling')->default(false);
            $table->string('product_locations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

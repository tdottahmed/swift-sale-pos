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
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('sub_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('barcode_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('unit_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('size_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('color_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('category_name')->nullable();
            $table->string('subCategory_name')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('barcodeType_name')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('size_name')->nullable();
            $table->string('color_name')->nullable();
            $table->string('title')->nullable();
            $table->string('sku')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('manage_stock')->nullable();
            $table->string('alert_qty')->nullable();
            $table->string('expire_in')->nullable();
            $table->string('expire_unit')->nullable();
            $table->string('applicable_tax')->nullable();
            $table->string('warranty')->nullable();
            $table->string('product_type')->nullable();
            $table->string('variation_name')->nullable();
            $table->string('variation_values')->nullable();
            $table->string('variation_skus')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('profit_margin')->nullable();
            $table->integer('selling_price')->nullable();
            $table->string('opening_stock')->nullable();
            $table->string('location')->nullable();
            $table->date('expire_date')->nullable();
            $table->boolean('enable_imei')->nullable();
            $table->string('weight')->nullable();
            $table->string('rack')->nullable();
            $table->string('row')->nullable();
            $table->string('position')->nullable();
            $table->string('customfield_1')->nullable();
            $table->string('customfield_2')->nullable();
            $table->string('customfield_3')->nullable();
            $table->string('customfield_4')->nullable();
            $table->string('customfield_5')->nullable();
            $table->boolean('not_for_sale')->nullable();
            $table->string('product_locations')->nullable();
            $table->boolean('status')->default('1');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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

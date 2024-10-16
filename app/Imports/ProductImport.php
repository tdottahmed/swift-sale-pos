<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use App\Models\BarcodeType;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductVariation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * Process the row before mapping it to the model
     *
     * @param array $row
     * @return array
     */
    public function mapHeaders($row): array
    {
        $processedRow = [];
        foreach ($row as $key => $value) {
            $newKey = strtolower(trim(preg_replace('/\s*\([^)]*\)/', '', $key)));
            $processedRow[$newKey] = $value;
        }
        return $processedRow;
    }
    public function model(array $row)
    {
        $row = $this->mapHeaders($row);

        $brand = Brand::firstOrCreate(['title' => $row['brand']]);
        $category = Category::firstOrCreate(['title' => $row['category']]);
        $subcategory = SubCategory::firstOrCreate(['title' => $row['sub_category'], 'category_id' => $category->id]);
        $unit = Unit::firstOrCreate(['title' => $row['unit']]);
        $barcodeType = BarcodeType::firstOrCreate(['title' => $row['barcode_type']]);
        $branch = Branch::firstOrCreate(['title' => $row['product_locations']]);

        // Create or update product
        $product = Product::updateOrCreate(
            ['sku' => $row['sku']],
            [
                'uuid' => $row['uuid'] ?? (string) Str::uuid(),
                'name' => $row['name'],
                'brand_id' => $brand->id,
                'category_id' => $category->id,
                'sub_category_id' => $subcategory->id,
                'barcode_type_id' => $barcodeType->id,
                'unit_id' => $unit->id,
                'brand' => $row['brand'],
                'unit' => $row['unit'],
                'category' => $row['category'],
                'sub_category' => $row['sub_category'],
                'sku' => $row['sku'],
                'barcode_type' => $row['barcode_type'],
                'sku' => $row['sku'],
                'manage_stock' => $row['manage_stock'],
                'alert_quantity' => $row['alert_quantity'],
                'expires_in' => $row['expires_in'],
                'expiry_period_unit' => $row['expiry_period_unit'],
                'applicable_tax' => $row['applicable_tax'],
                'selling_price_tax_type' => $row['selling_price_tax_type'],
                'product_type' => $row['product_type'],
                'expiry_date' => $row['expiry_date'],
                'enable_imei_or_serial' => $row['enable_imei'] ?? 0,
                'image' => $row['image'],
                'description' => $row['product_description'],
                'custom_field_1' => $row['custom_field_1'],
                'custom_field_2' => $row['custom_field_2'],
                'custom_field_3' => $row['custom_field_3'],
                'custom_field_4' => $row['custom_field_4'],
                'not_for_selling' => $row['not_for_selling'] ?? 0,
                'product_locations' => $row['product_locations'],
            ]
        );

        if ($row['product_type'] === 'single') {
            $product->update([
                'purchase_price_including_tax' => $row['purchase_price_including_tax'],
                'purchase_price_excluding_tax' => $row['purchase_price_excluding_tax'],
                'selling_price' => $row['selling_price'],
                'profit_margin' => $row['profit_margin'],
                'opening_stock' => $row['opening_stock'],
            ]);
        }
        if ($row['product_type'] === 'variable' && !empty($row['variation_name'])) {
            $variationName =  $row['variation_name'];
            $variationValues = explode('|', $row['variation_values']);
            $variationSkus = explode('|', $row['variation_skus']);
            $variationStocks = explode('|', $row['opening_stock']);
            $variationPurchaseIncs = explode('|', $row['purchase_price_including_tax']);
            $variationPurchaseExcs = explode('|', $row['purchase_price_excluding_tax']);
            $variationSellingPrices = explode('|', $row['selling_price']);
            $variationProfitMargins = explode('|', $row['profit_margin']);
            // $variationImages = explode('|', $row['variation_image']);

            foreach ($variationSkus as $index => $variationSku) {
                $variation = Variation::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'variation_sku' => $variationSku,
                    ],
                    [
                        'product_variation' => $variationName,
                        'value' => $variationValues[$index],
                        'stock' => $variationStocks[$index],
                        'purchase_inc' => $variationPurchaseIncs[$index],
                        'purchase_exc' => $variationPurchaseExcs[$index],
                        'selling_price' => $variationSellingPrices[$index],
                        'profit_margin' => $variationProfitMargins[$index],
                        // 'variation_image' => $variationImages[$index] ?? null,
                    ]
                );
            }
        }


        return $product;
    }
}

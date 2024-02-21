<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'uuid' => Str::uuid(),
            'name' => $row[0],
            'brand' => $row[1],
            'unit' => $row[2],
            'category' => $row[3],
            'sub_category' => $row[4],
            'sku' => $row[5], // Leave blank to auto generate sku
            'barcode_type' => $row[6],
            'manage_stock' => $row[7] == 1 ? true : false,
            'alert_quantity' => $row[8],
            'expires_in' => $row[9],
            'expiry_period_unit' => $row[10],
            'applicable_tax' => $row[11],
            'selling_price_tax_type' => $row[12],
            'product_type' => $row[13],
            'variation_name' => $row[14],
            'variation_values' => $row[15],
            'variation_skus' => $row[16],
            'purchase_price_including_tax' => $row[17],
            'purchase_price_excluding_tax' => $row[18],
            'profit_margin' => $row[19],
            'selling_price' => $row[20],
            'opening_stock' => $row[21],
            'location' => $row[22],
            'expiry_date' => $row[23],
            'enable_imei_or_serial' => $row[24] == 1 ? true : false,
            'weight' => $row[25],
            'rack' => $row[26],
            'row' => $row[27],
            'position' => $row[28],
            'image' => $row[29],
            'description' => $row[30],
            'custom_field_1' => $row[31],
            'custom_field_2' => $row[32],
            'custom_field_3' => $row[33],
            'custom_field_4' => $row[34],
            'not_for_selling' => $row[35] == 1 ? true : false,
            'product_locations' => $row[36]
        ]);
        
        
    }

    public function startRow(): int
    {
        return 2;
    }
}

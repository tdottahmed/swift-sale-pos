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
            'category_name' => $row[0],
            'brand_name' => $row[2],
            'barcodeType_name' => $row[3],
            'unit_name' => $row[4],
            'size_name' => $row[5],
            'color_name' => $row[6],
            'sku' => $row[7],
            'description' => $row[8],
            'image' => $row[9],
            'manage_stock' => $row[10],
            'alert_qty' => $row[11],
            'expire_in' => $row[12],
            'expire_unit' => $row[13],
            'applicable_tax' => $row[14],
            'warranty' => $row[15],
            'product_type' => $row[16],
            'variation_name' => $row[17],
            'variation_values' => $row[18],
            'variation_skus' => $row[19],
            'purchase_price' => $row[20],
            'tax_type' => $row[21],
            'profit_margin' => $row[22],
            'selling_price' => $row[23],
            'opening_stock' => $row[24],
            'location' => $row[25],
            'expire_date' => $row[26],
            'enable_imei' => $row[27],
            'weight' => $row[28],
            'rack' => $row[29],
            'row' => $row[30],
            'position' => $row[31],
            'customfield_1' => $row[32],
            'customfield_2' => $row[33],
            'customfield_3' => $row[34],
            'customfield_4' => $row[35],
            'not_for_sale' => $row[36],
            'product_locations' => $row[37]
        ]);
        
    }

    public function startRow(): int
    {
        return 2;
    }
}

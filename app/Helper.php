<?php 
namespace App;

use Milon\Barcode\DNS1D;

class Helper
{
    public static function generateBarcode($sku)
    {
        $barcode = new DNS1D();
        $barcode->setStorPath(storage_path('app/public/product/barcodes/'));

        // Generate the barcode image
        $barcodeData = $sku;
        $barcodeType = 'C128'; // Use Code 128 for SKU codes
        $barcodeImage = $barcode->getBarcodePNG($barcodeData, $barcodeType);

        return $barcodeImage;
    }
}

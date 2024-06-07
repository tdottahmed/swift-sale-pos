<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use App\Models\BarcodeType;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view product', ['only' => ['index']]);
        $this->middleware('permission:create product', ['only' => ['create', 'store']]);
        $this->middleware('permission:update product', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete product', ['only' => ['destroy']]);
        $this->middleware('permission:import product', ['only' => ['import', 'excelStore', 'labelPrint', 'generateUniqueSKU', 'filterProduct']]);
    }

    public function index()
    {
        $products = Product::latest()->get();
        $stocks = [];
        foreach ($products as $product) {
            $stockCount = Variation::where('product_id', $product->id)->sum('stock');
            $stocks[$product->id] = $stockCount;
        }
        return view('product.index', compact('products', 'stocks'));
    }

    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $units = Unit::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.create', compact('categories', 'subCategories', 'brands', 'colors', 'sizes', 'units', 'barcodeTypes'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        try {
            $data = [];
            $data['sku'] = $request->sku ?? $this->generateUniqueSKU();
            if ($request->file('image_1')) {
                $image =  uploadImage($request->file('image_1'), 'products/images');
            }
            $data += $request->except('child', 'sku', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6',);
            $product = Product::create([
                'uuid' => Str::uuid(),
                'sku'  => $request->sku ? $request->sku : $this->generateProductSKU(),
                'image' => $image
            ] + $data);

            $images = [];
            foreach (range(1, 7) as $index) {
                if ($request->hasFile('image_' . $index)) {
                    $imagePath = uploadImage($request->file('image_' . $index), 'products/images');
                    $images['image_' . $index] = $imagePath;
                }
            }
            ProductImage::create([
                'product_id' => $product->id,
            ] + $images);

            $variationData = $request->child;
            foreach ($variationData['value'] as $key => $value) {
                Variation::create([
                    'product_id' => $product->id,
                    'branch_id' =>$request->branch_id,
                    'product_variation' => $request->variation_name,
                    'value' => $variationData['value'][$key] ?? null,
                    'stock' => $variationData['stock'][$key] ?? null,
                    'variation_sku' => $variationData['variation_sku'][$key] ??  $data['sku'] . '-' . $key,
                    'value' => $value,
                    'purchase_inc' => $variationData['purchase_inc'][$key] ?? null,
                    'purchase_exc' => $variationData['purchase_exc'][$key] ?? null,
                    'selling_price' => $variationData['selling_price'][$key] ?? null,
                    'profit_marging' => $variationData['profit_marging'][$key] ?? null,
                    'variation_image' => $variationData['variation_image'][$key] ?? null,


                ]);
            }
            return redirect(route('product.index'))->with('success', 'Product Created Successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show(Product $product)
    {
        $variations = DB::table('variations')->where('product_id', $product->id)->get();
        return view('product.show', compact('product', 'variations'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $units = Unit::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.edit', compact('categories', 'subCategories', 'brands', 'colors', 'sizes', 'units', 'barcodeTypes', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        try {

            if ($request->sku && $request->sku !== $product->sku) {
                return back()->with('error', 'Product SKU already exists');
            }
            $data = [];
            $data['sku'] = $request->sku ?? $this->generateUniqueSKU();
            if ($request->file('image_1')) {
                $image =  uploadImage($request->file('image_1'), 'products/images');
                $data['image'] = $image;
            }
            $data += $request->except('child', 'sku', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6',);
            $product->update($data);

            $images = [];
            foreach (range(1, 7) as $index) {
                if ($request->hasFile('image_' . $index)) {
                    $imagePath = uploadImage($request->file('image_' . $index), 'products/images');
                    $images['image_' . $index] = $imagePath;
                }
            }
            $product->images()->updateOrCreate(
                ['product_id' => $product->id],
                $images
            );
            $variationData = $request->child;
            foreach ($variationData['value'] as $key => $value) {
                $variation = $product->variations()->where('variation_sku', $variationData['variation_sku'][$key])->first();
                if ($variation) {
                    $variation->update([
                        'product_variation' => $request->variation_name,
                        'value' => $variationData['value'][$key],
                        'stock' => $variationData['stock'][$key],
                        'variation_sku' => $variationData['variation_sku'][$key] ?? $data['sku'] . '-' . $key,
                        'purchase_inc' => $variationData['purchase_inc'][$key],
                        'purchase_exc' => $variationData['purchase_exc'][$key],
                        'selling_price' => $variationData['selling_price'][$key],
                        'profit_marging' => $variationData['profit_marging'][$key],
                    ]);
                } else {
                    $product->variations()->create([
                        'product_variation' => $request->variation_name,
                        'value' => $variationData['value'][$key],
                        'stock' => $variationData['stock'][$key],
                        'variation_sku' => $variationData['variation_sku'][$key] ?? $data['sku'] . '-' . $key,
                        'purchase_inc' => $variationData['purchase_inc'][$key],
                        'purchase_exc' => $variationData['purchase_exc'][$key],
                        'selling_price' => $variationData['selling_price'][$key],
                        'profit_marging' => $variationData['profit_marging'][$key],
                    ]);
                }
            }
            return redirect(route('product.index'))->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }

    public function import()
    {
        return view('product.import');
    }

    public function excelStore(Request $request)

    {
        $file = $request->excel;
        Excel::import(new ProductImport, $file);
        return redirect()->back();
    }

    public function labelPrint($id)
    {
        $products = Variation::where('product_id', $id)->get();
        $mainProduct = Product::find($id);
        return view('product.label', compact('products', 'mainProduct'));
    }


    private function generateUniqueSKU()
    {
        $sku = mt_rand(1000, 99999);
        return $sku;
    }

    public function filterProduct($sku)
    {
        $variations = Variation::with('product')
            ->where('variation_sku', 'like', '%' . $sku . '%')
            ->get();

        // Initialize an empty array to store products
        $products = [];

        // Loop through each variation to get its associated product
        foreach ($variations as $variation) {
            // Access the product relationship on each variation
            $product = $variation->product;

            // Add the product to the array if it exists
            if ($product) {
                $products[] = $product;
            }
        }

        // Return the response with products
        return response()->json(['products' => $products]);
    }

    public function generateProductSKU()
    {
        do {
            $randomNumber = str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
            $sku = 'SKU-' . $randomNumber;
            $existingProduct = Product::where('sku', $sku)->first();
        } while ($existingProduct);
        return $sku;
    }

    public function checkSKU(Request $request)
    {
        $sku = $request->sku;
        $exists = Product::where('sku', $sku)->exists();
        return response()->json(['exists' => $exists]);
    }
}

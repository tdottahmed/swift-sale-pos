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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $stocks = [];

        foreach ($products as $product) {
            $stockCount = Variation::where('product_id', $product->id)->sum('stock');
            $stocks[$product->id] = $stockCount;
        }


        return view('product.index', compact('products', 'stocks'));
    }

    // public function indexApi(Request $request)
    // {
    //     $query = Product::query();

    //     // Filter by category
    //     if ($request->has('category')) {
    //         $query->where('category', $request->category);
    //     }

    //     // Filter by brand
    //     if ($request->has('brand')) {
    //         $query->where('brand', $request->brand);
    //     }

    //     // Filter by SKU
    //     if ($request->has('sku')) {
    //         $query->where('sku', 'LIKE', '%' . $request->sku . '%');
    //     }

    //     $products = $query->get();


    //     return response()->json($products);
    // }

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
        try {
            if ($request->sku) {
                Product::where('sku', $request->sku)->exists();
                return back()->with('error', 'product SKU is already Exist');
            }
            $image = $request->file('image');
            $data = [];
            $data['sku'] = $request->sku ?? $this->generateUniqueSKU();
            if ($image) {
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(200, 250)->save(public_path('storage/product/' . $image_name));
                $data['image'] = $image_name;
            }
            $data += $request->except('child', 'variation_sku', 'stock', 'purchase_inc', 'purchase_exc', 'profit_marging', 'product_variation', 'enable_imei', 'sku');
            $product = Product::create([
                'uuid' => Str::uuid()
            ] + $data);

            if ($request->product_type == 'single') {
                Variation::create([
                    'product_id' => $product->id,
                    'variation_sku' => $request->variation_sku ?? $data['sku'],
                    'value' => $request->value,
                    'stock' => $request->stock,
                    'purchase_inc' => $request->purchase_inc,
                    'purchase_exc' => $request->purchase_exc,
                    'selling_price' => $request->selling_price,
                    'profit_marging' => $request->profit_marging,
                    'variation_image' => $request->variation_image,
                ]);
            } else {
                $variationData = $request->child;
                foreach ($variationData['value'] as $key => $value) {
                    Variation::create([
                        'product_id' => $product->id,
                        'product_variation' => $request->product_variation,
                        'value' => $variationData['value'][$key] ?? null,
                        'stock' => $variationData['stock'][$key] ?? null,
                        'variation_sku' => $variationData['variation_sku'][$key] ??  $data['sku'] . '-' . $key,
                        'value' => $value,
                        'purchase_inc' => $variationData['purchase_inc'][$key] ?? null,
                        'purchase_exc' => $variationData['purchase_exc'][$key] ?? null,
                        'selling_price' => $variationData['selling_price'][$key] ?? null,
                        'profit_marging' => $variationData['profit_marging'][$key] ?? null,
                    ]);
                }
            }
            return redirect(route('product.index'))->with('success', 'Product Created Successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
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
        $variations = Variation::where('product_id', $product->id)->get();

        return view('product.edit', compact('categories', 'subCategories', 'brands', 'colors', 'sizes', 'units', 'barcodeTypes', 'product', 'variations'));
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($request->sku && $request->sku !== $product->sku) {
                if (Product::where('sku', $request->sku)->exists()) {
                    return back()->with('error', 'Product SKU already exists');
                }
                $product->sku = $request->sku;
            }

            $image = $request->file('image');
            if ($image) {
                $path = public_path('storage/product/' . $product->image);
                if (is_file($path)) {
                    unlink($path);
                }

                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(200, 250)->save(public_path('storage/product/' . $image_name));
            } else {
                $image_name = $product->image;
            }

            $product->update($request->except('child', 'variation_sku', 'stock', 'purchase_inc', 'purchase_exc', 'profit_marging', 'product_variation', 'enable_imei', 'sku'));

            if ($request->product_type == 'single') {
                $variation = Variation::where('product_id', $product->id)->first();
                $variation->update([
                    'variation_sku' => $request->variation_sku ?? $product->sku,
                    'value' => $request->value,
                    'stock' => $request->stock,
                    'purchase_inc' => $request->purchase_inc,
                    'purchase_exc' => $request->purchase_exc,
                    'selling_price' => $request->selling_price,
                    'profit_marging' => $request->profit_marging,
                    'variation_image' => $request->variation_image,
                ]);
            } else {
                $variationData = $request->child;
                foreach ($variationData['value'] as $key => $value) {
                    Variation::updateOrCreate(
                        ['id' => $variationData['id'][$key] ?? null],
                        [
                            'product_id' => $product->id,
                            'product_variation' => $request->product_variation,
                            'value' => $variationData['value'][$key] ?? null,
                            'stock' => $variationData['stock'][$key] ?? null,
                            'variation_sku' => $variationData['variation_sku'][$key] ??  $product->sku . '-' . $key,
                            'value' => $value,
                            'purchase_inc' => $variationData['purchase_inc'][$key] ?? null,
                            'purchase_exc' => $variationData['purchase_exc'][$key] ?? null,
                            'selling_price' => $variationData['selling_price'][$key] ?? null,
                            'profit_marging' => $variationData['profit_marging'][$key] ?? null,
                        ]
                    );
                }
            }

            return redirect(route('product.index'))->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    // public function update(Request $request, Product $product)
    // {
    //     dd('hello');
    //     $image = $request->file('image');
    //     if ($image) {
    //         $path = public_path('storage/product/' . $product->image);
    //         if (is_file($path)) {
    //             unlink($path);
    //         }

    //         $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

    //         Image::make($image)->resize(200, 250)->save(public_path('storage/product/' . $image_name));
    //     } else {
    //         $image_name = $product->image;
    //     }

    //     $data = [];
    //     $data['image'] = $image_name;

    //     $data += $request->all();

    //     $product->update($data);


    //     return redirect(route('product.index'))->with('success', 'Product Info Updated Successfully');
    // }

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

//     public function filterProduct($sku)
//     {
//         $variations = Variation::with('product')
//             ->where('variation_sku', 'like', '%' . $sku . '%')
//             ->get();
// dd($variations->product);
//         return response()->json(['variations' => $variations]);
//     }

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

}

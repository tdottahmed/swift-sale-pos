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
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
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


        $image = $request->file('image');
        // $request->validate([
        //     'title'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);
        $data = [];
        if ($image) {
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 250)->save(public_path('storage/product/' . $image_name));
            $data['image'] = $image_name;
        }
        $data += $request->except('child', 'variation_sku', 'purchase_inc', 'purchase_exc', 'profit_marging', 'product_variation', 'enable_imei');
        $product = Product::create([
            'uuid' => Str::uuid()
        ] + $data);

        if ($request->product_type == 'single') {
            Variation::create([
                'product_id' => $product->id,
                'variation_sku' => $request->variation_sku,
                'value' => $request->value,
                'purchase_inc' => $request->purchase_inc,
                'purchase_exc' => $request->purchase_exc,
                'selling_price' => $request->selling_price,
                'profit_marging' => $request->profit_marging,
                'variation_image' => $request->variation_image,
                
            ]);
        } else {
            $variationData = $request->child;
            foreach ($variationData['variation_sku'] as $key => $sku) {
                Variation::create([
                    'product_id' => $product->id,
                    'product_variation'=>$request->product_variation,
                    'variation_sku' => $sku,
                    'value' => $variationData['value'][$key] ?? null,
                    'purchase_inc' => $variationData['purchase_inc'][$key] ?? null,
                    'purchase_exc' => $variationData['purchase_exc'][$key] ?? null,
                    'selling_price' => $variationData['selling_price'][$key] ?? null,
                    'profit_marging' => $variationData['profit_marging'][$key] ?? null,
                ]);
            }
        }
        return redirect(route('product.index'))->with('success', 'Category Create Successfully');
    }

    public function show(Product $product)
    {
        $variations = DB::table('variations')->where('product_id', $product->id)->get();
        // dd($variations);
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

        $data = [];
        $data['image'] = $image_name;

        $data += $request->all();

        $product->update($data);


        return redirect(route('product.index'))->with('success', 'Product Info Updated Successfully');
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
}

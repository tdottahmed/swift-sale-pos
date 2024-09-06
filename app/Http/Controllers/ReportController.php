<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{


    public function profitLoss(Request $request)
    {
        return view('reports.profit-loss.index');
    }
    public function purchaseSale(Request $request)
    {
        return view('reports.purchase-sale.index');
    }

    public function profitByProduct()
    {
        $profits = DB::table('product_sales')
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->leftJoin('variations', function ($join) {
                $join->on('product_sales.product_id', '=', 'variations.product_id')
                    ->on('product_sales.product_id', '=', 'variations.product_id'); // Adjust this join if necessary
            })
            ->select(
                'products.name',
                DB::raw('SUM(CASE 
            WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variations.purchase_inc, 0))
            ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
        END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('products.id')
            ->get();

        return view('reports.profit-loss.partials.by-product', compact('profits'));
    }

    public function profitByCategory()
    {
        $profitsByCategory = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->leftJoin('product_sales', 'products.id', '=', 'product_sales.product_id')
            ->leftJoin('variations', function ($join) {
                $join->on('product_sales.product_id', '=', 'variations.product_id');
            })
            ->select(
                'categories.title as category_name',
                DB::raw('SUM(CASE 
            WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variations.purchase_inc, 0))
            ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
        END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('categories.id', 'categories.title')
            ->get();

        return view('reports.profit-loss.partials.by-category', compact('profitsByCategory'));
    }

    public function profitByBrand()
    {
        $profitsByBrands = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('product_sales', 'products.id', '=', 'product_sales.product_id')
            ->leftJoin('variations', function ($join) {
                $join->on('products.id', '=', 'variations.product_id');
            })
            ->select(
                'brands.title as brand_title',
                DB::raw('SUM(CASE 
                WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variations.purchase_inc, 0))
                ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
            END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('brands.id', 'brands.title')
            ->get();

        return view('reports.profit-loss.partials.by-brands', compact('profitsByBrands'));
    }

    public function profitByDay()
    {
        $salesData = DB::table('sales')
            ->join('product_sales', 'sales.id', '=', 'product_sales.sale_id')  // Join sales with product_sales
            ->join('products', 'products.id', '=', 'product_sales.product_id')  // Join product_sales with products
            ->leftJoin('variations', function ($join) {
                $join->on('product_sales.product_id', '=', 'variations.product_id')
                    ->whereColumn('product_sales.product_id', 'variations.product_id'); // Adjust this join if necessary
            })
            ->select(
                DB::raw('DAYNAME(sales.created_at) as day_name'),
                DB::raw('SUM(product_sales.sub_total) as total_sales'),  // Total sales amount per product
                DB::raw('SUM(product_sales.quantity) as total_quantity'),  // Total quantity sold
                DB::raw('SUM(CASE 
            WHEN products.product_type = "variable" THEN (product_sales.sub_total - (product_sales.quantity * COALESCE(variations.purchase_inc, 0)))
            ELSE (product_sales.sub_total - (product_sales.quantity * COALESCE(products.purchase_price_including_tax, 0)))
        END) as total_profit')  // Corrected profit calculation
            )
            // Uncomment the line below if you want to restrict the results to the last 7 days
            // ->whereBetween('sales.created_at', [Carbon::now()->subDays(6)->startOfDay(), Carbon::now()->endOfDay()])  // Last 7 days
            ->groupBy(DB::raw('DAYNAME(sales.created_at)'), DB::raw('WEEKDAY(sales.created_at)'))  // Group by day name and weekday
            ->orderBy(DB::raw('WEEKDAY(sales.created_at)'))  // Order by weekday (to ensure correct sequence)
            ->get();

        return view('reports.profit-loss.partials.by-day', compact('salesData'));
    }

    public function profitByCustomer()
    {
        // Fetch and return data for profit by customer
    }
}
